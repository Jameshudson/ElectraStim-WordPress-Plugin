<?php
/**
 * Created by IntelliJ IDEA.
 * User: Cyrex
 * Date: 12/02/2016
 * Time: 11:56
 */

namespace modules\payment_tracker;

defined( 'ABSPATH' ) or die( 'No script kiddies please!' );

class Setting {

	private $adminOptionSection;

	public function __construct(){

		 //section
		 $this->adminOptionSection = new \modules\library\wrappers\settings\AdminOptionSection();

		 $this->adminOptionSection->setId("payment_tracker");
		 $this->adminOptionSection->setTitle("Payment Tracker Options");
		 $this->adminOptionSection->setCallback(array($this, "payment"));

		 // $adminOptionPage->addOptionSection($adminOptionSection);

		 //field
		 $adminOptiionField = new \modules\library\wrappers\settings\AdminOptionField();

		 $adminOptiionField->setId("test");
		 $adminOptiionField->setTitle("test");
		 $adminOptiionField->setCallback(array($this, "callback"));
		$adminOptiionField->setSection("payment_tracker");

		 $this->adminOptionSection->addOptionField($adminOptiionField);

		 $this->adminOptionSection->setPage("general");

		 add_action("admin_menu", array($this , "sectionsLoader"));
	}

	public function sectionsLoader(){

		$this->adminOptionSection->init();
	}

	public function callback(){

		echo "callback";
	}

	public function payment(){

		echo "hello";
	}
}