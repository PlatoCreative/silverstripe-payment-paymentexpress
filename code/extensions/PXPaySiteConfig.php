<?php
/*
*	PXPaySiteConfig extends SiteConfig
*/
class PXPaySiteConfig extends DataExtension {
	private static $db = array(
		'dev_user_id' => 'Varchar(250)',
		'dev_key' => 'Varchar(250)',
		'live_user_id' => 'Varchar(250)',
		'live_key' => 'Varchar(250)'
	);

	public function updateCMSFields(FieldList $fields) {
		$fields->addFieldsToTab('Root.PXPayInfo', array(
			ToggleCompositeField::create('DevelopmentSettings', 'Development Settings',
				array(
					TextField::create('dev_user_id', 'User ID'),
					TextField::create('dev_key', 'Key')
				)
			),
			ToggleCompositeField::create('LiveSettings', 'Live Settings',
				array(
					TextField::create('live_user_id', 'User ID'),
					TextField::create('live_key', 'Key')
				)
			)
		));
				
		return $fields;
	}
}