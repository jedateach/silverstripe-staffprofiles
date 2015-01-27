<?php

class StaffProfile extends DataObject {

	private static $db = array(
		"FirstName" => "Varchar(255)",
		"Surname" => "Varchar(255)",
		"Position" => "Varchar(255)",
		"Email" => "Varchar",
		"Phone" => "Varchar",
		"Content" => "HTMLText",
		"Sort" => "Int"
	);

	private static $has_one = array(
		"Image" => "Image",
		"Parent" => "StaffProfilesPage"
	);

	private static $indexes = array(
		"Sort" => true
	);

	private static $searchable_fields = array(
		"Name" => "PartialMatchFilter"
	);

	private static $summary_fields = array(
		"Name" => "Name",
		"Email" => "Email",
		"Title" => "Title"
	);

	private static $singular_name = "Staff Profile";
	private static $plural_name = "Staff Profiles";

	private static $default_sort = "Sort ASC, Name ASC";

	private static $defaults = array(
		"Sort" => 100
	);

	public function getCMSFields() {
		$fields = parent::getCMSFields();
		$fields->removeByName("ParentID");
		$fields->removeByName("Sort");

		return $fields;
	}

	public function getName() {
		return implode(" ", array($this->FirstName, $this->Surname));
	}

	public function getTitle() {
		return $this->getName();
	}

}
