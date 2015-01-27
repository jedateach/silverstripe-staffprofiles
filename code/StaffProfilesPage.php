<?php

class StaffProfilesPage extends Page {

	private static $has_many = array(
		"StaffProfiles" => "StaffProfile"
	);

	public function getCMSFields() {
		$fields = parent::getCMSFields();
		$fields->addFieldToTab(
			"Root.Profiles",
			new GridField(
				"StaffProfiles",
				"Staff Profiles",
				$this->StaffProfiles(),
				$config = GridFieldConfig_RecordEditor::create()
			)
		);
		if(class_exists("GridFieldOrderableRows")){
			$config->addComponent(new GridFieldOrderableRows());
		}


		return $fields;
	}

}

class StaffProfilesPage_Controller extends Page_Controller {


}
