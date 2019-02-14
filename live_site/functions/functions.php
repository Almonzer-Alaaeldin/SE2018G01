<?php
//Get non-empty POST variables with their childs
function POST_Organized(&$PostArray) {
	$POST_Filtered = array();
	$hasChild = '';
	$childNames = '';
	$i = 0;
	ksort( $PostArray );
	foreach ( $PostArray as $key => $postValue ) {
		$i++;
		if (htmlentities(trim($postValue)) === '') {
			$postValue = null;
		}
		if ( strpos( $key, "_" ) !== false || $key == "FormType" ) {
			if ( strpos( $key, "Doc" ) !== false || $key == "FormType" ) {
				//Document or 'FormType' field
				//Child Question
				if ( $hasChild != '' && $i == count( $PostArray ) ) {
					$POST_Filtered[ $hasChild ][ 1 ] = $childNames;
					$hasChild = '';
				}
				continue;
			}
			//Child Question
			if ( $hasChild == '' ) {
				$hasChild = substr( $key, 0, strpos( $key, "_" ) );
				$childNames = $key;
			} else {
				$childNames .= ',' . $key;
			}
			if ( $i == count( $PostArray ) ) {
				$POST_Filtered[ $hasChild ][ 1 ] = $childNames;
				$hasChild = '';
			}
			continue;
		} else {
			$POST_Filtered[ $key ][ 0 ] = htmlentities(trim($postValue));
			$POST_Filtered[ $key ][ 1 ] = 0;
		}
		if ( $hasChild != '' ) {
			$POST_Filtered[ $hasChild ][ 1 ] = $childNames;
			$hasChild = '';
		}
	}
	return $POST_Filtered;
}

//Array search partially in strings
function array_search_partial( $SearchStr, $Array ) {
	foreach ( $Array as $Index => $ArrElement ) {
		if ( strpos( $ArrElement, $SearchStr ) !== FALSE ) {
			return $Index;
		}
	}
	return FALSE;
}

//Get any user's type by ID
function GetAccountType($ID) {
	$AccountType = '';
	include( "dbconnect.php" );
	$Statement = $conn->prepare( "SELECT Type FROM accounts WHERE AccountID = ? LIMIT 1" );
	$Statement->bind_param( "i", $ID );
	if ( $Statement->execute() ) {
		$result = $Statement->get_result();
		$result = $result->fetch_array();
		$AccountType = strtolower( $result[ 0 ] );
	} else {
		$AccountType = null;
	}
	$Statement->close();
	return $AccountType;
}

function SubmitFilesMaterial( $AccountType, & $Message, $isDraft = true ) {
	include( "dbconnect.php" );
	$Message = '';
	foreach ( $_FILES as $key => $file ) {
		$CorrFieldKey = substr($key,0,strpos($key,"_Doc"));
		if (($file[ 'size' ] == 0 && $file[ 'error' ] == 0) || !isset($_POST[$CorrFieldKey]) ) {
			//No upload exists or pre-upload field is empty
			unlink("../users/" . $_SESSION[ 'UserID' ] . "/".$key.'.pdf');
			continue;

		}
		$SavedFilePath = null;
		$isUploaded = UploadDoc( $file, "../users/" . $_SESSION[ 'UserID' ] . "/materials/", $key, $SavedFilePath, $fileMsg );
		$Message .= '<br>' . $fileMsg;
		if ( $isUploaded ) { //Uploaded
			//Update database with new link
			$Statement2 = $conn->prepare( "UPDATE qualify_materials SET DocLink = ? WHERE MaterialID = ?" );
			$Statement2->bind_param( "si", $SavedFilePath );
			$Statement2->execute();
			$Statement2->close();
		}
	}
}

//File Management START
function UploadDoc( $RawFile, $Directory, $NewName, & $SavedFilePath, & $Message ) {
	$Message = '';
	if ( $RawFile[ 'error' ] > UPLOAD_ERR_OK ) {
		$Message .= "لقد حدث عطلًا ما خلال رفع ملفاتك، برجاء المحاولة لاحقًا.";
		return false;
	}
	//Check if user directory doesn't exist: create it.
	if ( !file_exists( $Directory ) ) {
		mkdir( $Directory, 0777, true );
	}
	//Rename file
	$oldName = $RawFile[ "name" ];
	$temp = explode( ".", $RawFile[ "name" ] );
	$newfilename = $NewName . '.' . end( $temp );
	$File = $Directory . $newfilename;
	$FileType = strtolower( pathinfo( $File, PATHINFO_EXTENSION ) );

	//Check File type is pdf or not
	$finfo = finfo_open( FILEINFO_MIME_TYPE );
	$mime = finfo_file( $finfo, $RawFile[ 'tmp_name' ] );
	$isValid = false;
	switch ( $mime ) {
		case "application/pdf":
			$isValid = true;
			break;
		default:
			$Message .= "لقد حاولت رفع ملف ليس بصيغة .pdf المطلوبة، برجاء تفقد الملفات المرفقة وتغييرها.<br>";
	}
	// Check file size (10MB limit)
	if ( $RawFile[ "size" ] > 10 * 1024 * 1024 ) {
		$Message .= "لقد حاولت رفع ملف أكبر من 10 ميجا بايت، برجاء تفقد الملفات المرفقة وتغييرها.<br>";
		$isValid = false;
	}
	// Check if $uploadOk is set to 0 by an error
	if ( !$isValid ) {
		$Message .= "لم يتم رفع الملفات الخاصة بك.<br>";
		return false;
		// if everything is ok, try to upload file
	} else {
		if ( move_uploaded_file( $RawFile[ "tmp_name" ], $File ) ) {
			$SavedFilePath = $File;
			$Message .= "تم رفع الملف:  " . basename( $oldName ) . "<br>";
			//$return .= "تم رفع الملف:  " . basename( $RawFile[ "name" ] );
			return true;
		} else {
			$Message .= "حدث عطلًا خلال رفع الملف: " . basename( $RawFile[ "name" ] );
			return false;
		}
	}
}
//File Management END
?>