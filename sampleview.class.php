<?php
/**
 * $Id$
 * PHP Web Toolkit Version 1.0.4 Alpha
 *
 * @package phpwebtk
 */
/**
 * class SampleView
 *
 * This class represents and displays information to the end user. The
 * information that is used in a dynamic display is retrieved from a
 * model. Handlers support views by encapsulating and adapting a model
 * for use in a display.
 *
 * @author Brian Bisaillon <bisailb@myprivacy.ca>
 * @copyright Copyright (C) 2004-2016 by Brian Bisaillon
 * @package phpwebtk
 * @subpackage templates
 */
class SampleView {
	// Private members
	private $Request;
	private $Smarty;
	private $SecurityPolicy;
	/**
	 * function __construct
	 *
	 * This method is executed when an object is instantiated from this
	 * class. Preprocessing can be done here before the object is put
	 * into service.
	 *
	 * @access public
	 */
	public function __construct(Request $Request) {
		$this->Request = $Request;
		$this->Smarty = new Smarty ();
	}
	/**
	 * function SetSmartyCaching
	 *
	 * This method is sets Smarty's caching options.
	 *
	 * @access public
	 */
	private function SetSmartyCaching() {
		$this->Smarty->cache_dir = CLASS_PATH . 'sampleview/cache';
		// $this->Smarty->cache_handler_func = array($this, 'function');
		$this->Smarty->cache_lifetime = 1800;
		$this->Smarty->cache_modified_check = false;
		$this->Smarty->caching = Smarty::CACHING_OFF;
	}
	/**
	 * function SetSmartyCompiler
	 *
	 * This method sets Smarty's compiler options.
	 *
	 * @access public
	 */
	private function SetSmartyCompiler() {
		$this->Smarty->compile_check = true;
		$this->Smarty->compile_dir = CLASS_PATH . 'sampleview/templates_c';
		$this->Smarty->compile_id = 'en';
		$this->Smarty->force_compile = true;
	}
	/**
	 * function SetSmartyConfiguration
	 *
	 * This method sets Smarty's configuration options.
	 *
	 * @access public
	 */
	private function SetSmartyConfiguration() {
		$this->Smarty->config_booleanize = true;
		$this->Smarty->config_dir = CLASS_PATH . 'sampleview/configs';
		$this->Smarty->config_overwrite = false;
		$this->Smarty->config_read_hidden = false;
	}
	/**
	 * function SetSmartyDebugging
	 *
	 * This method sets Smarty's debugging options.
	 *
	 * @access public
	 */
	private function SetSmartyDebugging() {
		$this->Smarty->debug_tpl = SMARTY_DIR . 'debug.tpl';
		$this->Smarty->debugging = false;
		$this->Smarty->debugging_ctrl = 'URL';
	}
	/**
	 * function SetSmartyDebugging
	 *
	 * This method sets Smarty's filtering options.
	 *
	 * @access public
	 */
	private function SetSmartyFilters() {
		// $this->Smarty->autoload_filters = array('pre' => array('trim', 'stamp'), 'output' => array('convert'));
		// $this->Smarty->loadFilter('output', 'tidyrepairhtml');
	}
	/**
	 * function SetSmartySecurity
	 *
	 * This method sets Smarty's security options.
	 *
	 * @access public
	 */
	private function SetSmartySecurity() {
		$this->SecurityPolicy = new Smarty_Security ( $this->Smarty );
		// Remove PHP tags
		$this->SecurityPolicy->php_handling = Smarty::PHP_REMOVE;
		// Disable all PHP functions
		$this->SecurityPolicy->php_functions = null;
		// Disable all PHP modifiers
		$this->SecurityPolicy->php_modifiers = null;
		// Disable access to constants
		$this->SecurityPolicy->allow_constants = false;
		// Disable access to PHP super globals
		$this->SecurityPolicy->allow_super_globals = false;
		// Enable security
		$this->Smarty->enableSecurity ( $this->SecurityPolicy );
	}
	/**
	 * function SetSmartyMiscellaneous
	 *
	 * This method sets Smarty's other miscellaneous options.
	 *
	 * @access public
	 */
	private function SetSmartyMiscellaneous() {
		// $this->Smarty->default_modifiers = array('escape:htmlall');
		$this->Smarty->default_resource_type = 'file';
		// $this->Smarty->default_template_handler_func = array($this, 'function');
		// $this->Smarty->error_reporting = 'value';
		$this->Smarty->left_delimiter = '{';
		$this->Smarty->plugins_dir = SMARTY_DIR . 'plugins';
		$this->Smarty->right_delimiter = '}';
		$this->Smarty->use_sub_dirs = true;
	}
	/**
	 * function SetViewTemplate
	 *
	 * This method sets the appropriate template to display to the user.
	 *
	 * @access public
	 */
	private function SetViewTemplate() {
		$this->Smarty->setTemplateDir ( array (
				'default' => CLASS_PATH . 'sampleview/templates',
				'gazetteer' => CLASS_PATH . 'sampleview/templates/gazetteer',
				'gila' => CLASS_PATH . 'sampleview/templates/gila',
				'gila_edit_form' => CLASS_PATH . 'sampleview/templates/gila',
				'prosimii' => CLASS_PATH . 'sampleview/templates/prosimii',
				'sinorca' => CLASS_PATH . 'sampleview/templates/sinorca',
				'tierraverde' => CLASS_PATH . 'sampleview/templates/tierraverde' 
		) );
		
		switch ($this->Request->HTTP_GET ['template']) {
			case "gazetteer" :
				$this->Smarty->assign ( 'STYLESHEET_PATH', 'phpwebtk/sampleview/templates/gazetteer/css/' );
				$this->Smarty->display ( $this->Smarty->getTemplateDir ( 'gazetteer' ) . 'gazetteer.xhtml' );
				break;
			case "gila" :
				$this->Smarty->assign ( 'STYLESHEET_PATH', 'phpwebtk/sampleview/templates/gila/css/' );
				$this->Smarty->display ( $this->Smarty->getTemplateDir ( 'gila' ) . 'gila.xhtml' );
				break;
			case "gila_edit_form" :
				$this->Smarty->assign ( 'STYLESHEET_PATH', 'phpwebtk/sampleview/templates/gila/css/' );
				$this->Smarty->display ( $this->Smarty->getTemplateDir ( 'gila_edit_form' ) . 'gila_edit_form.xhtml' );
				break;
			case "prosimii" :
				$this->Smarty->assign ( 'STYLESHEET_PATH', 'phpwebtk/sampleview/templates/prosimii/css/' );
				$this->Smarty->display ( $this->Smarty->getTemplateDir ( 'prosimii' ) . 'prosimii.xhtml' );
				break;
			case "sinorca" :
				$this->Smarty->assign ( 'STYLESHEET_PATH', 'phpwebtk/sampleview/templates/sinorca/css/' );
				$this->Smarty->display ( $this->Smarty->getTemplateDir ( 'sinorca' ) . 'sinorca.xhtml' );
				break;
			case "tierraverde" :
				$this->Smarty->assign ( 'STYLESHEET_PATH', 'phpwebtk/sampleview/templates/tierraverde/css/' );
				$this->Smarty->display ( $this->Smarty->getTemplateDir ( 'tierraverde' ) . 'tierraverde.xhtml' );
				break;
			default :
				$this->Smarty->display ( $this->Smarty->getTemplateDir ( 'default' ) . 'index.xhtml' );
				break;
		}
	}
	/**
	 * function Display
	 *
	 * This method displays the complete view to the user.
	 *
	 * @access public
	 * @static
	 *
	 */
	public function Display() {
		$this->SetSmartyCaching ();
		$this->SetSmartyCompiler ();
		$this->SetSmartyConfiguration ();
		$this->SetSmartyDebugging ();
		$this->SetSmartyFilters ();
		$this->SetSmartySecurity ();
		$this->SetSmartyMiscellaneous ();
		if (isset ( $this->Request->HTTP_GET ['template'] )) {
			$this->SetViewTemplate ();
		} else {
			$this->Smarty->setTemplateDir ( CLASS_PATH . 'sampleview/templates' );
			$this->Smarty->display ( $this->Smarty->getTemplateDir ( 'default' ) . 'index.xhtml' );
		}
	}
}
?>
