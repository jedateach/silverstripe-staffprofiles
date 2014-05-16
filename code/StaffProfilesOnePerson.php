<?php

/**
 *@author nicolaas[at]sunnysideup.co.nz
 *@description: displays a list of staff profiles
 *
 */
class StaffProfilesOnePerson extends Page {

	private static $icon = "mysite/images/treeicons/StaffProfilesOnePerson";

	private static $allowed_children = "none"; //can also be "none";

	private static $default_parent = "StaffProfilesPage"; // *URLSegment* of default parent node.

	private static $can_be_root = false; //default is true
	//parents and children in classes

	private static $db = array(
		"Email" => "Varchar(100)",
		"Position" => "Varchar(100)"
	);

	private static $has_one = array(
		"ProfilePicture" => "Image"
	);

	function getCMSFields() {
		$fields = parent::getCMSFields();
		$fields->replaceField("Title", new TextField("Title", "Name"));
		$fields->replaceField("MenuTitle", new TextField("MenuTitle", "Name for use in menus"));
		$fields->addFieldToTab("Root.PersonalDetails", new TextField("Email", "Email"));
		$fields->addFieldToTab("Root.PersonalDetails", new TextField("Position", "Position"));
		$fields->addFieldToTab("Root.PersonalDetails", new UploadField("ProfilePicture", "ProfilePicture"));
		return $fields;
	}

	function Description() {
		return $this->Content;
	}

	function Name() {
		return $this->Title;
	}


  public function EmailObfuscatorName() {
		$obj = HideMailto::convert_email($this->Email);
		if($obj) {
			return $obj->Text;
		}
	}

	public function EmailObfuscatorLink() {
		$obj = HideMailto::convert_email($this->Email);
		if($obj) {
			return $obj->MailTo;
		}
	}


}

class StaffProfilesOnePerson_Controller extends Page_Controller {

	function init() {
		parent::init();
		Requirements::themedCSS("StaffProfilesOnePerson");
	}

}

