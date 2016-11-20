<?php
/**
 * $Id$
 * PHP Web Toolkit Version 1.0.4 Alpha
 *
 * @package phpwebtk
 */
/**
 * class KsesRequestHandler
 *
 * This class handles requests it is responsible for and can access its
 * successor. If this class can handle the request, it does so;
 * otherwise it forwards the request to its successor.
 *
 * @author Brian Bisaillon <bisailb@myprivacy.ca>
 * @copyright Copyright (C) 2004-2016 by Brian Bisaillon
 * @package phpwebtk
 * @subpackage textprocessing
 */
class KsesRequestHandler extends RequestHandler {
	// Private members
	private static $KsesRequestHandler;
	// Private members
	private $Kses;
	/**
	 * function BasicTags
	 *
	 * This method allows and/or disallows XHTML's basic tags.
	 *
	 * @access public
	 */
	public function BasicTags(Kses5 $Kses5) {
		/*
		 * HTML (DTD: Strict/Transitional/Frameset)
		 * $Kses5->AddHTML('html',
		 * array('xmlns' => 1,
		 * 'dir' => 0,
		 * 'lang' => 0,
		 * 'xml:lang' => 0
		 * )
		 * );
		 */
		/*
		 * Body (DTD: Strict/Transitional/Frameset)
		 * $Kses5->AddHTML('body',
		 * array('alink' => 0,
		 * 'background' => 0,
		 * 'bgcolor' => 0,
		 * 'link' => 0,
		 * 'text' => 0,
		 * 'vlink' => 0,
		 * 'id' => 0,
		 * 'class' => 0,
		 * 'title' => 0,
		 * 'style' => 0,
		 * 'dir' => 0,
		 * 'lang' => 0,
		 * 'xml:lang' => 0
		 * )
		 * );
		 */
		// Header 1 to header 6 (DTD: Strict/Transitional/Frameset)
		$Kses5->AddHTML ( 'h1', array (
				'align' => 0 
		) ); // DTD: Transitional/Frameset

		$Kses5->AddHTML ( 'h2', array (
				'align' => 0 
		) ); // DTD: Transitional/Frameset

		$Kses5->AddHTML ( 'h3', array (
				'align' => 0 
		) ); // DTD: Transitional/Frameset

		$Kses5->AddHTML ( 'h4', array (
				'align' => 0 
		) ); // DTD: Transitional/Frameset

		$Kses5->AddHTML ( 'h5', array (
				'align' => 0 
		) ); // DTD: Transitional/Frameset

		$Kses5->AddHTML ( 'h6', array (
				'align' => 0 
		) ); // DTD: Transitional/Frameset

		// Paragraph (DTD: Strict/Transitional/Frameset)
		$Kses5->AddHTML ( 'p', array (
				'align' => 0, // DTD: Transitional/Frameset
				'id' => 0,
				'class' => 0,
				'title' => 0,
				'style' => 0,
				'dir' => 0,
				'lang' => 0,
				'xml:lang' => 0,
				'onclick' => 0,
				'ondblclick' => 0,
				'onmousedown' => 0,
				'onmouseup' => 0,
				'onmouseover' => 0,
				'onmousemove' => 0,
				'onmouseout' => 0,
				'onkeypress' => 0,
				'onkeydown' => 0,
				'onkeyup' => 0 
		) );
		// Single line break (DTD: Strict/Transitional/Frameset)
		$Kses5->AddHTML ( 'br', array (
				'id' => 0,
				'class' => 0,
				'title' => 0,
				'style' => 0 
		) );
		// Horizontal rule (DTD: Strict/Transitional/Frameset)
		$Kses5->AddHTML ( 'hr', array (
				'align' => 0, // DTD: Transitional/Frameset
				'noshade' => 0, // DTD: Transitional/Frameset
				'size' => 0, // DTD: Transitional/Frameset
				'width' => 0, // DTD: Transitional/Frameset
				'id' => 0,
				'class' => 0,
				'title' => 0,
				'style' => 0,
				'dir' => 0,
				'lang' => 0,
				'xml:lang' => 0,
				'onclick' => 0,
				'ondblclick' => 0,
				'onmousedown' => 0,
				'onmouseup' => 0,
				'onmouseover' => 0,
				'onmousemove' => 0,
				'onmouseout' => 0,
				'onkeypress' => 0,
				'onkeydown' => 0,
				'onkeyup' => 0 
		) );
	}
	/**
	 * function CharacterFormatTags
	 *
	 * This method allows and/or disallows XHTML's character format tags.
	 *
	 * @access public
	 */
	public function CharacterFormatTags(Kses5 $Kses5) {
		// Bold text (DTD: Strict/Transitional/Frameset)
		$Kses5->AddHTML ( 'b', array (
				'id' => 0,
				'class' => 0,
				'title' => 0,
				'style' => 0,
				'dir' => 0,
				'lang' => 0,
				'onclick' => 0,
				'ondblclick' => 0,
				'onmousedown' => 0,
				'onmouseup' => 0,
				'onmouseover' => 0,
				'onmousemove' => 0,
				'onmouseout' => 0,
				'onkeypress' => 0,
				'onkeydown' => 0,
				'onkeyup' => 0 
		) );
		/*
		 * Font face, size, and color of text (DTD: Transitional/Frameset)
		 * $Kses5->AddHTML('font',
		 * array('color' => 0,
		 * 'face' => 0,
		 * 'size' => 0,
		 * 'id' =>0,
		 * 'class' => 0,
		 * 'title' => 0,
		 * 'style' => 0,
		 * 'dir' => 0,
		 * 'lang' => 0,
		 * 'xml:lang' => 0
		 * )
		 * );
		 */
		// Italic text (DTD: Strict/Transitional/Frameset)
		$Kses5->AddHTML ( 'i', array (
				'id' => 0,
				'class' => 0,
				'title' => 0,
				'style' => 0,
				'dir' => 0,
				'lang' => 0,
				'onclick' => 0,
				'ondblclick' => 0,
				'onmousedown' => 0,
				'onmouseup' => 0,
				'onmouseover' => 0,
				'onmousemove' => 0,
				'onmouseout' => 0,
				'onkeypress' => 0,
				'onkeydown' => 0,
				'onkeyup' => 0 
		) );
		// Emphasized text (DTD: Strict/Transitional/Frameset)
		$Kses5->AddHTML ( 'em', array (
				'id' => 0,
				'class' => 0,
				'title' => 0,
				'style' => 0,
				'dir' => 0,
				'lang' => 0,
				'xml:lang' => 0,
				'onclick' => 0,
				'ondblclick' => 0,
				'onmousedown' => 0,
				'onmouseup' => 0,
				'onmouseover' => 0,
				'onmousemove' => 0,
				'onmouseout' => 0,
				'onkeypress' => 0,
				'onkeydown' => 0,
				'onkeyup' => 0 
		) );
		// Big text (DTD: Strict/Transitional/Frameset)
		$Kses5->AddHTML ( 'big', array (
				'id' => 0,
				'class' => 0,
				'title' => 0,
				'style' => 0,
				'dir' => 0,
				'lang' => 0,
				'onclick' => 0,
				'ondblclick' => 0,
				'onmousedown' => 0,
				'onmouseup' => 0,
				'onmouseover' => 0,
				'onmousemove' => 0,
				'onmouseout' => 0,
				'onkeypress' => 0,
				'onkeydown' => 0,
				'onkeyup' => 0 
		) );
		// Strong text (DTD: Strict/Transitional/Frameset)
		$Kses5->AddHTML ( 'strong', array (
				'id' => 0,
				'class' => 0,
				'title' => 0,
				'style' => 0,
				'dir' => 0,
				'lang' => 0,
				'xml:lang' => 0,
				'onclick' => 0,
				'ondblclick' => 0,
				'onmousedown' => 0,
				'onmouseup' => 0,
				'onmouseover' => 0,
				'onmousemove' => 0,
				'onmouseout' => 0,
				'onkeypress' => 0,
				'onkeydown' => 0,
				'onkeyup' => 0 
		) );
		// Small text (DTD: Strict/Transitional/Frameset)
		$Kses5->AddHTML ( 'small', array (
				'id' => 0,
				'class' => 0,
				'title' => 0,
				'style' => 0,
				'dir' => 0,
				'lang' => 0,
				'onclick' => 0,
				'ondblclick' => 0,
				'onmousedown' => 0,
				'onmouseup' => 0,
				'onmouseover' => 0,
				'onmousemove' => 0,
				'onmouseout' => 0,
				'onkeypress' => 0,
				'onkeydown' => 0,
				'onkeyup' => 0 
		) );
		// Superscripted text (DTD: Strict/Transitional/Frameset)
		$Kses5->AddHTML ( 'sup', array (
				'id' => 0,
				'class' => 0,
				'title' => 0,
				'style' => 0,
				'dir' => 0,
				'lang' => 0,
				'xml:lang' => 0,
				'onclick' => 0,
				'ondblclick' => 0,
				'onmousedown' => 0,
				'onmouseup' => 0,
				'onmouseover' => 0,
				'onmousemove' => 0,
				'onmouseout' => 0,
				'onkeypress' => 0,
				'onkeydown' => 0,
				'onkeyup' => 0 
		) );
		// Subscripted text (DTD: Strict/Transitional/Frameset)
		$Kses5->AddHTML ( 'sub', array (
				'id' => 0,
				'class' => 0,
				'title' => 0,
				'style' => 0,
				'dir' => 0,
				'lang' => 0,
				'xml:lang' => 0,
				'onclick' => 0,
				'ondblclick' => 0,
				'onmousedown' => 0,
				'onmouseup' => 0,
				'onmouseover' => 0,
				'onmousemove' => 0,
				'onmouseout' => 0,
				'onkeypress' => 0,
				'onkeydown' => 0,
				'onkeyup' => 0 
		) );
		// Direction of text display (DTD: Strict/Transitional/Frameset)
		$Kses5->AddHTML ( 'bdo', array (
				'dir' => 1,
				'id' => 0,
				'class' => 0,
				'title' => 0,
				'style' => 0,
				'dir' => 0,
				'lang' => 0,
				'xml:lang' => 0 
		) );
		/*
		 * Underlined text (DTD: Transitional/Frameset)
		 * $Kses5->AddHTML('u',
		 * array('id' =>0,
		 * 'class' => 0,
		 * 'title' => 0,
		 * 'style' => 0,
		 * 'dir' => 0,
		 * 'lang' => 0,
		 * 'xml:lang' => 0,
		 * 'onclick' => 0,
		 * 'ondblclick' => 0,
		 * 'onmousedown' => 0,
		 * 'onmouseup' => 0,
		 * 'onmouseover' => 0,
		 * 'onmousemove' => 0,
		 * 'onmouseout' => 0,
		 * 'onkeypress' => 0,
		 * 'onkeydown' => 0,
		 * 'onkeyup' => 0
		 * )
		 * );
		 */
	}
	/**
	 * function OutputTags
	 *
	 * This method allows and/or disallows XHTML's output tags.
	 *
	 * @access public
	 */
	public function OutputTags(Kses5 $Kses5) {
		// Preformatted text (DTD: Strict/Transitional/Frameset)
		$Kses5->AddHTML ( 'pre', array (
				'width' => 0, // DTD: Transitional/Frameset
				'id' => 0,
				'class' => 0,
				'title' => 0,
				'style' => 0,
				'dir' => 0,
				'lang' => 0,
				'xml:lang' => 0,
				'xml:space' => 0,
				'onclick' => 0,
				'ondblclick' => 0,
				'onmousedown' => 0,
				'onmouseup' => 0,
				'onmouseover' => 0,
				'onmousemove' => 0,
				'onmouseout' => 0,
				'onkeypress' => 0,
				'onkeydown' => 0,
				'onkeyup' => 0 
		) );
		// Code text (DTD: Strict/Transitional/Frameset)
		$Kses5->AddHTML ( 'code', array (
				'id' => 0,
				'class' => 0,
				'title' => 0,
				'style' => 0,
				'dir' => 0,
				'lang' => 0,
				'xml:lang' => 0,
				'onclick' => 0,
				'ondblclick' => 0,
				'onmousedown' => 0,
				'onmouseup' => 0,
				'onmouseover' => 0,
				'onmousemove' => 0,
				'onmouseout' => 0,
				'onkeypress' => 0,
				'onkeydown' => 0,
				'onkeyup' => 0 
		) );
		// Teletype text (DTD: Strict/Transitional/Frameset)
		$Kses5->AddHTML ( 'tt', array (
				'id' => 0,
				'class' => 0,
				'title' => 0,
				'style' => 0,
				'dir' => 0,
				'lang' => 0,
				'onclick' => 0,
				'ondblclick' => 0,
				'onmousedown' => 0,
				'onmouseup' => 0,
				'onmouseover' => 0,
				'onmousemove' => 0,
				'onmouseout' => 0,
				'onkeypress' => 0,
				'onkeydown' => 0,
				'onkeyup' => 0 
		) );
		// Keyboard text (DTD: Strict/Transitional/Frameset)
		$Kses5->AddHTML ( 'kbd', array (
				'id' => 0,
				'class' => 0,
				'title' => 0,
				'style' => 0,
				'dir' => 0,
				'lang' => 0,
				'xml:lang' => 0,
				'onclick' => 0,
				'ondblclick' => 0,
				'onmousedown' => 0,
				'onmouseup' => 0,
				'onmouseover' => 0,
				'onmousemove' => 0,
				'onmouseout' => 0,
				'onkeypress' => 0,
				'onkeydown' => 0,
				'onkeyup' => 0 
		) );
		// Definition term (DTD: Strict/Transitional/Frameset)
		$Kses5->AddHTML ( 'dfn', array (
				'id' => 0,
				'class' => 0,
				'title' => 0,
				'style' => 0,
				'dir' => 0,
				'lang' => 0,
				'xml:lang' => 0,
				'onclick' => 0,
				'ondblclick' => 0,
				'onmousedown' => 0,
				'onmouseup' => 0,
				'onmouseover' => 0,
				'onmousemove' => 0,
				'onmouseout' => 0,
				'onkeypress' => 0,
				'onkeydown' => 0,
				'onkeyup' => 0 
		) );
		// Variable (DTD: Strict/Transitional/Frameset)
		$Kses5->AddHTML ( 'var', array (
				'id' => 0,
				'class' => 0,
				'title' => 0,
				'style' => 0,
				'dir' => 0,
				'lang' => 0,
				'xml:lang' => 0,
				'onclick' => 0,
				'ondblclick' => 0,
				'onmousedown' => 0,
				'onmouseup' => 0,
				'onmouseover' => 0,
				'onmousemove' => 0,
				'onmouseout' => 0,
				'onkeypress' => 0,
				'onkeydown' => 0,
				'onkeyup' => 0 
		) );
		// Sample computer code (DTD: Strict/Transitional/Frameset)
		$Kses5->AddHTML ( 'samp', array (
				'id' => 0,
				'class' => 0,
				'title' => 0,
				'style' => 0,
				'dir' => 0,
				'lang' => 0,
				'xml:lang' => 0,
				'onclick' => 0,
				'ondblclick' => 0,
				'onmousedown' => 0,
				'onmouseup' => 0,
				'onmouseover' => 0,
				'onmousemove' => 0,
				'onmouseout' => 0,
				'onkeypress' => 0,
				'onkeydown' => 0,
				'onkeyup' => 0 
		) );
	}
	/**
	 * function BlockTags
	 *
	 * This method allows and/or disallows XHTML's block tags.
	 *
	 * @access public
	 */
	public function BlockTags(Kses5 $Kses5) {
		// Acronym (DTD: Strict/Transitional/Frameset)
		$Kses5->AddHTML ( 'acronym', array (
				'id' => 0,
				'class' => 0,
				'title' => 1,
				'style' => 0,
				'dir' => 0,
				'lang' => 0,
				'xml:lang' => 0,
				'onclick' => 0,
				'ondblclick' => 0,
				'onmousedown' => 0,
				'onmouseup' => 0,
				'onmouseover' => 0,
				'onmousemove' => 0,
				'onmouseout' => 0,
				'onkeypress' => 0,
				'onkeydown' => 0,
				'onkeyup' => 0 
		) );
		// Abbreviation (DTD: Strict/Transitional/Frameset)
		$Kses5->AddHTML ( 'abbreviation', array (
				'id' => 0,
				'class' => 0,
				'title' => 1,
				'style' => 0,
				'dir' => 0,
				'lang' => 0,
				'xml:lang' => 0,
				'onclick' => 0,
				'ondblclick' => 0,
				'onmousedown' => 0,
				'onmouseup' => 0,
				'onmouseover' => 0,
				'onmousemove' => 0,
				'onmouseout' => 0,
				'onkeypress' => 0,
				'onkeydown' => 0,
				'onkeyup' => 0 
		) );
		// Address (DTD: Strict/Transitional/Frameset)
		$Kses5->AddHTML ( 'address', array (
				'id' => 0,
				'class' => 0,
				'title' => 0,
				'style' => 0,
				'dir' => 0,
				'lang' => 0,
				'xml:lang' => 0,
				'onclick' => 0,
				'ondblclick' => 0,
				'onmousedown' => 0,
				'onmouseup' => 0,
				'onmouseover' => 0,
				'onmousemove' => 0,
				'onmouseout' => 0,
				'onkeypress' => 0,
				'onkeydown' => 0,
				'onkeyup' => 0 
		) );
		// Long quotation (DTD: Strict/Transitional/Frameset)
		$Kses5->AddHTML ( 'blockquote', array (
				'cite' => 1,
				'id' => 0,
				'class' => 0,
				'title' => 0,
				'style' => 0,
				'dir' => 0,
				'lang' => 0,
				'xml:lang' => 0,
				'onclick' => 0,
				'ondblclick' => 0,
				'onmousedown' => 0,
				'onmouseup' => 0,
				'onmouseover' => 0,
				'onmousemove' => 0,
				'onmouseout' => 0,
				'onkeypress' => 0,
				'onkeydown' => 0,
				'onkeyup' => 0 
		) );
		/*
		 * Centered text (DTD: Transitional/Frameset)
		 * $Kses5->AddHTML('center',
		 * array('id' =>0,
		 * 'class' => 0,
		 * 'title' => 0,
		 * 'style' => 0,
		 * 'dir' => 0,
		 * 'lang' => 0,
		 * 'xml:lang' => 0,
		 * 'onclick' => 0,
		 * 'ondblclick' => 0,
		 * 'onmousedown' => 0,
		 * 'onmouseup' => 0,
		 * 'onmouseover' => 0,
		 * 'onmousemove' => 0,
		 * 'onmouseout' => 0,
		 * 'onkeypress' => 0,
		 * 'onkeydown' => 0,
		 * 'onkeyup' => 0
		 * )
		 * );
		 */
		// Short quotation (DTD: Strict/Transitional/Frameset)
		$Kses5->AddHTML ( 'q', array (
				'cite' => 1,
				'id' => 0,
				'class' => 0,
				'title' => 0,
				'style' => 0,
				'dir' => 0,
				'lang' => 0,
				'xml:lang' => 0,
				'onclick' => 0,
				'ondblclick' => 0,
				'onmousedown' => 0,
				'onmouseup' => 0,
				'onmouseover' => 0,
				'onmousemove' => 0,
				'onmouseout' => 0,
				'onkeypress' => 0,
				'onkeydown' => 0,
				'onkeyup' => 0 
		) );
		// Citation (DTD: Strict/Transitional/Frameset)
		$Kses5->AddHTML ( 'cite', array (
				'id' => 0,
				'class' => 0,
				'title' => 0,
				'style' => 0,
				'dir' => 0,
				'lang' => 0,
				'xml:lang' => 0,
				'onclick' => 0,
				'ondblclick' => 0,
				'onmousedown' => 0,
				'onmouseup' => 0,
				'onmouseover' => 0,
				'onmousemove' => 0,
				'onmouseout' => 0,
				'onkeypress' => 0,
				'onkeydown' => 0,
				'onkeyup' => 0 
		) );
		// Inserted text (DTD: Strict/Transitional/Frameset)
		$Kses5->AddHTML ( 'ins', array (
				'cite' => 1,
				'datetime' => 1,
				'id' => 0,
				'class' => 0,
				'title' => 0,
				'style' => 0,
				'dir' => 0,
				'lang' => 0,
				'xml:lang' => 0,
				'onclick' => 0,
				'ondblclick' => 0,
				'onmousedown' => 0,
				'onmouseup' => 0,
				'onmouseover' => 0,
				'onmousemove' => 0,
				'onmouseout' => 0,
				'onkeypress' => 0,
				'onkeydown' => 0,
				'onkeyup' => 0 
		) );
		// Deleted text (DTD: Strict/Transitional/Frameset)
		$Kses5->AddHTML ( 'del', array (
				'cite' => 1,
				'datetime' => 1,
				'id' => 0,
				'class' => 0,
				'title' => 0,
				'style' => 0,
				'dir' => 0,
				'lang' => 0,
				'xml:lang' => 0,
				'onclick' => 0,
				'ondblclick' => 0,
				'onmousedown' => 0,
				'onmouseup' => 0,
				'onmouseover' => 0,
				'onmousemove' => 0,
				'onmouseout' => 0,
				'onkeypress' => 0,
				'onkeydown' => 0,
				'onkeyup' => 0 
		) );
		// Strikethrough text (DTD: Transitional/Frameset)
		$Kses5->AddHTML ( 's', array (
				'id' => 0,
				'class' => 0,
				'title' => 0,
				'style' => 0,
				'dir' => 0,
				'lang' => 0,
				'xml:lang' => 0,
				'onclick' => 0,
				'ondblclick' => 0,
				'onmousedown' => 0,
				'onmouseup' => 0,
				'onmouseover' => 0,
				'onmousemove' => 0,
				'onmouseout' => 0,
				'onkeypress' => 0,
				'onkeydown' => 0,
				'onkeyup' => 0 
		) );
		/*
		 * Strikethrough text (DTD: Transitional/Frameset)
		 * $Kses5->AddHTML('strike',
		 * array('id' =>0,
		 * 'class' => 0,
		 * 'title' => 0,
		 * 'style' => 0,
		 * 'dir' => 0,
		 * 'lang' => 0,
		 * 'xml:lang' => 0,
		 * 'onclick' => 0,
		 * 'ondblclick' => 0,
		 * 'onmousedown' => 0,
		 * 'onmouseup' => 0,
		 * 'onmouseover' => 0,
		 * 'onmousemove' => 0,
		 * 'onmouseout' => 0,
		 * 'onkeypress' => 0,
		 * 'onkeydown' => 0,
		 * 'onkeyup' => 0
		 * )
		 * );
		 */
	}
	/**
	 * function LinkTags
	 *
	 * This method allows and/or disallows XHTML's link tags.
	 *
	 * @access public
	 */
	public function LinkTags(Kses5 $Kses5) {
		// Anchor (DTD: Strict/Transitional/Frameset)
		$Kses5->AddHTML ( 'a', array (
				'charset' => 1,
				'coords' => 1,
				'href' => 1,
				'hreflang' => 1,
				'name' => 1,
				'rel' => 1,
				'rev' => 1,
				'shape' => 1,
				'target' => 0,
				'type' => 1,
				'id' => 0,
				'class' => 0,
				'title' => 0,
				'style' => 0,
				'dir' => 0,
				'lang' => 0,
				'xml:lang' => 0,
				'tabindex' => 0,
				'accesskey' => 0,
				'onclick' => 0,
				'ondblclick' => 0,
				'onmousedown' => 0,
				'onmouseup' => 0,
				'onmouseover' => 0,
				'onmousemove' => 0,
				'onmouseout' => 0,
				'onkeypress' => 0,
				'onkeydown' => 0,
				'onkeyup' => 0 
		) );
		// Resource reference (DTD: Strict/Transitional/Frameset)
		$Kses5->AddHTML ( 'link', array (
				'charset' => 1,
				'href' => 1,
				'hreflang' => 1,
				'media' => 1,
				'rel' => 1,
				'rev' => 1,
				'target' => 0,
				'type' => 1,
				'id' => 0,
				'class' => 0,
				'title' => 0,
				'style' => 0,
				'dir' => 0,
				'lang' => 0,
				'xml:lang' => 0,
				'onclick' => 0,
				'ondblclick' => 0,
				'onmousedown' => 0,
				'onmouseup' => 0,
				'onmouseover' => 0,
				'onmousemove' => 0,
				'onmouseout' => 0,
				'onkeypress' => 0,
				'onkeydown' => 0,
				'onkeyup' => 0 
		) );
	}
	/**
	 * function FrameTags
	 *
	 * This method allows and/or disallows XHTML's frame tags.
	 *
	 * @access public
	 */
	public function FrameTags(Kses5 $Kses5) {
		// Sub windows (a frame) (DTD: Frameset)
		$Kses5->AddHTML ( 'frame', array (
				'frameborder' => 1,
				'longdesc' => 1,
				'marginheight' => 1,
				'marginwidth' => 1,
				'name' => 1,
				'noresize' => 1,
				'scrolling' => 1,
				'src' => 1,
				'id' => 0,
				'class' => 0,
				'title' => 0,
				'style' => 0 
		) );
		// Set of frames (DTD: Frameset)
		$Kses5->AddHTML ( 'frameset', array (
				'cols' => 1,
				'rows' => 1,
				'id' => 0,
				'class' => 0,
				'title' => 0,
				'style' => 0 
		) );
		// Noframe section (DTD: Transitional/Frameset)
		$Kses5->AddHTML ( 'noframes', array (
				'id' => 0,
				'class' => 0,
				'title' => 0,
				'style' => 0,
				'dir' => 0,
				'lang' => 0,
				'xml:lang' => 0 
		) );
		// Inline sub window (frame) (DTD: Transitional/Frameset)
		$Kses5->AddHTML ( 'iframe', array (
				'align' => 1,
				'frameborder' => 1,
				'height' => 1,
				'longdesc' => 1,
				'marginheight' => 1,
				'marginwidth' => 1,
				'name' => 1,
				'scrolling' => 1,
				'src' => 1,
				'width' => 1,
				'id' => 0,
				'class' => 0,
				'title' => 0,
				'style' => 0 
		) );
	}
	/**
	 * function InputTags
	 *
	 * This method allows and/or disallows XHTML's input tags.
	 *
	 * @access public
	 */
	public function InputTags(Kses5 $Kses5) {
		// Form (DTD: Strict/Transitional/Frameset)
		$Kses5->AddHTML ( 'form', array (
				'action' => 1,
				'accept' => 1,
				'accept-charset' => 1,
				'enctype' => 1,
				'method' => 1,
				'name' => 0, // DTD: Transitional/Frameset
				'target' => 0, // DTD: Transitional/Frameset
				'id' => 0,
				'class' => 0,
				'title' => 0,
				'style' => 0,
				'dir' => 0,
				'lang' => 0,
				'xml:lang' => 0,
				'onsubmit' => 0,
				'onreset' => 0,
				'onclick' => 0,
				'ondblclick' => 0,
				'onmousedown' => 0,
				'onmouseup' => 0,
				'onmouseover' => 0,
				'onmousemove' => 0,
				'onmouseout' => 0,
				'onkeypress' => 0,
				'onkeydown' => 0,
				'onkeyup' => 0 
		) );
		// Input (DTD: Strict/Transitional/Frameset)
		$Kses5->AddHTML ( 'input', array (
				'accept' => 1,
				'align' => 0, // DTD: Transitional/Frameset
				'alt' => 1,
				'checked' => 1,
				'disabled' => 1,
				'maxlength' => 1,
				'name' => 1,
				'readonly' => 1,
				'size' => 1,
				'src' => 1,
				'type' => 1,
				'value' => 1,
				'id' => 0,
				'class' => 0,
				'title' => 0,
				'style' => 0,
				'dir' => 0,
				'lang' => 0,
				'xml:lang' => 0,
				'tabindex' => 0,
				'accesskey' => 0,
				'onfocus' => 0,
				'onblur' => 0,
				'onselect' => 0,
				'onchange' => 0,
				'onclick' => 0,
				'ondblclick' => 0,
				'onmousedown' => 0,
				'onmouseup' => 0,
				'onmouseover' => 0,
				'onmousemove' => 0,
				'onmouseout' => 0,
				'onkeypress' => 0,
				'onkeydown' => 0,
				'onkeyup' => 0 
		) );
		// Textarea (DTD: Strict/Transitional/Frameset)
		$Kses5->AddHTML ( 'textarea', array (
				'cols' => 1,
				'rows' => 1,
				'disabled' => 1,
				'name' => 1,
				'readonly' => 1,
				'id' => 0,
				'class' => 0,
				'title' => 0,
				'style' => 0,
				'dir' => 0,
				'lang' => 0,
				'xml:lang' => 0,
				'tabindex' => 0,
				'accesskey' => 0,
				'onfocus' => 0,
				'onblur' => 0,
				'onselect' => 0,
				'onchange' => 0,
				'onclick' => 0,
				'ondblclick' => 0,
				'onmousedown' => 0,
				'onmouseup' => 0,
				'onmouseover' => 0,
				'onmousemove' => 0,
				'onmouseout' => 0,
				'onkeypress' => 0,
				'onkeydown' => 0,
				'onkeyup' => 0 
		) );
		// Push button (DTD: Strict/Transitional/Frameset)
		$Kses5->AddHTML ( 'button', array (
				'disabled' => 1,
				'name' => 1,
				'type' => 1,
				'value' => 1,
				'id' => 0,
				'class' => 0,
				'title' => 0,
				'style' => 0,
				'dir' => 0,
				'lang' => 0,
				'xml:lang' => 0,
				'accesskey' => 0,
				'tabindex' => 0,
				'onfocus' => 0,
				'onblur' => 0,
				'onselect' => 0,
				'onchange' => 0,
				'onclick' => 0,
				'ondblclick' => 0,
				'onmousedown' => 0,
				'onmouseup' => 0,
				'onmouseover' => 0,
				'onmousemove' => 0,
				'onmouseout' => 0,
				'onkeypress' => 0,
				'onkeydown' => 0,
				'onkeyup' => 0 
		) );
		// Selectable list (DTD: Strict/Transitional/Frameset)
		$Kses5->AddHTML ( 'select', array (
				'disabled' => 1,
				'multiple' => 1,
				'name' => 1,
				'size' => 1,
				'id' => 0,
				'class' => 0,
				'title' => 0,
				'style' => 0,
				'dir' => 0,
				'lang' => 0,
				'xml:lang' => 0,
				'accesskey' => 0,
				'tabindex' => 0,
				'onfocus' => 0,
				'onblur' => 0,
				'onchange' => 0 
		) );
		// Option group (DTD: Strict/Transitional/Frameset)
		$Kses5->AddHTML ( 'optgroup', array (
				'label' => 1,
				'disabled' => 1,
				'id' => 0,
				'class' => 0,
				'title' => 0,
				'style' => 0,
				'dir' => 0,
				'lang' => 0,
				'xml:lang' => 0,
				'tabindex' => 0,
				'onclick' => 0,
				'ondblclick' => 0,
				'onmousedown' => 0,
				'onmouseup' => 0,
				'onmouseover' => 0,
				'onmousemove' => 0,
				'onmouseout' => 0,
				'onkeypress' => 0,
				'onkeydown' => 0,
				'onkeyup' => 0 
		) );
		// Label for a form control (DTD: Strict/Transitional/Frameset)
		$Kses5->AddHTML ( 'label', array (
				'for' => 1,
				'id' => 0,
				'class' => 0,
				'title' => 0,
				'style' => 0,
				'dir' => 0,
				'lang' => 0,
				'xml:lang' => 0,
				'accesskey' => 0,
				'onfocus' => 0,
				'onblur' => 0,
				'onclick' => 0,
				'ondblclick' => 0,
				'onmousedown' => 0,
				'onmouseup' => 0,
				'onmouseover' => 0,
				'onmousemove' => 0,
				'onmouseout' => 0,
				'onkeypress' => 0,
				'onkeydown' => 0,
				'onkeyup' => 0 
		) );
		// Fieldset (DTD: Strict/Transitional/Frameset)
		$Kses5->AddHTML ( 'fieldset', array (
				'id' => 0,
				'class' => 0,
				'title' => 0,
				'style' => 0,
				'dir' => 0,
				'lang' => 0,
				'xml:lang' => 0,
				'accesskey' => 0,
				'onclick' => 0,
				'ondblclick' => 0,
				'onmousedown' => 0,
				'onmouseup' => 0,
				'onmouseover' => 0,
				'onmousemove' => 0,
				'onmouseout' => 0,
				'onkeypress' => 0,
				'onkeydown' => 0,
				'onkeyup' => 0 
		) );
		// Caption for a fieldset (DTD: Strict/Transitional/Frameset)
		$Kses5->AddHTML ( 'legend', array (
				'align' => 0, // DTD: Transitional/Frameset
				'id' => 0,
				'class' => 0,
				'title' => 0,
				'style' => 0,
				'dir' => 0,
				'lang' => 0,
				'xml:lang' => 0,
				'accesskey' => 0,
				'onclick' => 0,
				'ondblclick' => 0,
				'onmousedown' => 0,
				'onmouseup' => 0,
				'onmouseover' => 0,
				'onmousemove' => 0,
				'onmouseout' => 0,
				'onkeypress' => 0,
				'onkeydown' => 0,
				'onkeyup' => 0 
		) );
	}
	/**
	 * function ListTags
	 *
	 * This method allows and/or disallows XHTML's list tags.
	 *
	 * @access public
	 */
	public function ListTags(Kses5 $Kses5) {
		// Unordered list (DTD: Strict/Transitional/Frameset)
		$Kses5->AddHTML ( 'ul', array (
				'compact' => 0, // DTD: Transitional/Frameset
				'type' => 0, // DTD: Transitional/Frameset
				'id' => 0,
				'class' => 0,
				'title' => 0,
				'style' => 0,
				'dir' => 0,
				'lang' => 0,
				'xml:lang' => 0,
				'onclick' => 0,
				'ondblclick' => 0,
				'onmousedown' => 0,
				'onmouseup' => 0,
				'onmouseover' => 0,
				'onmousemove' => 0,
				'onmouseout' => 0,
				'onkeypress' => 0,
				'onkeydown' => 0,
				'onkeyup' => 0 
		) );
		// Ordered list (DTD: Strict/Transitional/Frameset)
		$Kses5->AddHTML ( 'ol', array (
				'compact' => 0, // DTD: Transitional/Frameset
				'start' => 0, // DTD: Transitional/Frameset
				'type' => 0, // DTD: Transitional/Frameset
				'id' => 0,
				'class' => 0,
				'title' => 0,
				'style' => 0,
				'dir' => 0,
				'lang' => 0,
				'xml:lang' => 0,
				'onclick' => 0,
				'ondblclick' => 0,
				'onmousedown' => 0,
				'onmouseup' => 0,
				'onmouseover' => 0,
				'onmousemove' => 0,
				'onmouseout' => 0,
				'onkeypress' => 0,
				'onkeydown' => 0,
				'onkeyup' => 0 
		) );
		// List item (DTD: Strict/Transitional/Frameset)
		$Kses5->AddHTML ( 'li', array (
				'type' => 0, // DTD: Transitional/Frameset
				'value' => 0, // DTD: Transitional/Frameset
				'id' => 0,
				'class' => 0,
				'title' => 0,
				'style' => 0,
				'dir' => 0,
				'lang' => 0,
				'xml:lang' => 0,
				'onclick' => 0,
				'ondblclick' => 0,
				'onmousedown' => 0,
				'onmouseup' => 0,
				'onmouseover' => 0,
				'onmousemove' => 0,
				'onmouseout' => 0,
				'onkeypress' => 0,
				'onkeydown' => 0,
				'onkeyup' => 0 
		) );
		/*
		 * Directory list (DTD: Transitional/Frameset)
		 * $Kses5->AddHTML('dir',
		 * array('compact' => 0,
		 * 'id' => 0,
		 * 'class' => 0,
		 * 'title' => 0,
		 * 'style' => 0,
		 * 'dir' => 0,
		 * 'lang' => 0,
		 * 'xml:lang' => 0,
		 * 'onclick' => 0,
		 * 'ondblclick' => 0,
		 * 'onmousedown' => 0,
		 * 'onmouseup' => 0,
		 * 'onmouseover' => 0,
		 * 'onmousemove' => 0,
		 * 'onmouseout' => 0,
		 * 'onkeypress' => 0,
		 * 'onkeydown' => 0,
		 * 'onkeyup' => 0
		 * )
		 * );
		 */
		// Definition list (DTD: Strict/Transitional/Frameset)
		$Kses5->AddHTML ( 'dl', array (
				'id' => 0,
				'class' => 0,
				'title' => 0,
				'style' => 0,
				'dir' => 0,
				'lang' => 0,
				'xml:lang' => 0,
				'onclick' => 0,
				'ondblclick' => 0,
				'onmousedown' => 0,
				'onmouseup' => 0,
				'onmouseover' => 0,
				'onmousemove' => 0,
				'onmouseout' => 0,
				'onkeypress' => 0,
				'onkeydown' => 0,
				'onkeyup' => 0 
		) );
		// Definition term (DTD: Strict/Transitional/Frameset)
		$Kses5->AddHTML ( 'dt', array (
				'id' => 0,
				'class' => 0,
				'title' => 0,
				'style' => 0,
				'dir' => 0,
				'lang' => 0,
				'xml:lang' => 0,
				'onclick' => 0,
				'ondblclick' => 0,
				'onmousedown' => 0,
				'onmouseup' => 0,
				'onmouseover' => 0,
				'onmousemove' => 0,
				'onmouseout' => 0,
				'onkeypress' => 0,
				'onkeydown' => 0,
				'onkeyup' => 0 
		) );
		// Definition description (DTD: Strict/Transitional/Frameset)
		$Kses5->AddHTML ( 'dd', array (
				'id' => 0,
				'class' => 0,
				'title' => 0,
				'style' => 0,
				'dir' => 0,
				'lang' => 0,
				'xml:lang' => 0,
				'onclick' => 0,
				'ondblclick' => 0,
				'onmousedown' => 0,
				'onmouseup' => 0,
				'onmouseover' => 0,
				'onmousemove' => 0,
				'onmouseout' => 0,
				'onkeypress' => 0,
				'onkeydown' => 0,
				'onkeyup' => 0 
		) );
		/*
		 * Menu list (DTD: Transitional/Frameset)
		 * $Kses5->AddHTML('menu',
		 * array('compact' => 0,
		 * 'id' => 0,
		 * 'class' => 0,
		 * 'title' => 0,
		 * 'style' => 0,
		 * 'dir' => 0,
		 * 'lang' => 0,
		 * 'xml:lang' => 0,
		 * 'onclick' => 0,
		 * 'ondblclick' => 0,
		 * 'onmousedown' => 0,
		 * 'onmouseup' => 0,
		 * 'onmouseover' => 0,
		 * 'onmousemove' => 0,
		 * 'onmouseout' => 0,
		 * 'onkeypress' => 0,
		 * 'onkeydown' => 0,
		 * 'onkeyup' => 0
		 * )
		 * );
		 */
	}
	/**
	 * function ImageTags
	 *
	 * This method allows and/or disallows XHTML's image tags.
	 *
	 * @access public
	 */
	public function ImageTags(Kses5 $Kses5) {
		// Image (DTD: Strict/Transitional/Frameset)
		$Kses5->AddHTML ( 'img', array (
				'alt' => 1,
				'src' => 1,
				'align' => 0, // DTD: Transitional/Frameset
				'border' => 0, // DTD: Transitional/Frameset
				'height' => 1,
				'hspace' => 0, // DTD: Transitional/Frameset
				'ismap' => 1,
				'longdesc' => 1,
				'usemap' => 1,
				'vspace' => 0, // DTD: Transitional/Frameset
				'width' => 1,
				'id' => 0,
				'class' => 0,
				'title' => 0,
				'style' => 0,
				'dir' => 0,
				'lang' => 0,
				'xml:lang' => 0,
				'onclick' => 0,
				'ondblclick' => 0,
				'onmousedown' => 0,
				'onmouseup' => 0,
				'onmouseover' => 0,
				'onmousemove' => 0,
				'onmouseout' => 0,
				'onkeypress' => 0,
				'onkeydown' => 0,
				'onkeyup' => 0 
		) );
		// Image map (DTD: Strict/Transitional/Frameset)
		$Kses5->AddHTML ( 'map', array (
				'id' => 1,
				'name' => 1,
				'class' => 0,
				'title' => 0,
				'style' => 0,
				'dir' => 0,
				'lang' => 0,
				'xml:lang' => 0,
				'tabindex' => 0,
				'accesskey' => 0,
				'onclick' => 0,
				'ondblclick' => 0,
				'onmousedown' => 0,
				'onmouseup' => 0,
				'onmouseover' => 0,
				'onmousemove' => 0,
				'onmouseout' => 0,
				'onkeypress' => 0,
				'onkeydown' => 0,
				'onkeyup' => 0,
				'onfocus' => 0,
				'onblur' => 0 
		) );
		// Area inside an image map (DTD: Strict/Transitional/Frameset)
		$Kses5->AddHTML ( 'area', array (
				'alt' => 1,
				'coords' => 1,
				'href' => 1,
				'nohref' => 1,
				'shape' => 1,
				'target' => 0, // DTD: Transitional/Frameset
				'id' => 0,
				'class' => 0,
				'title' => 0,
				'style' => 0,
				'dir' => 0,
				'lang' => 0,
				'xml:lang' => 0,
				'tabindex' => 0,
				'accesskey' => 0,
				'onclick' => 0,
				'ondblclick' => 0,
				'onmousedown' => 0,
				'onmouseup' => 0,
				'onmouseover' => 0,
				'onmousemove' => 0,
				'onmouseout' => 0,
				'onkeypress' => 0,
				'onkeydown' => 0,
				'onkeyup' => 0,
				'onfocus' => 0,
				'onblur' => 0 
		) );
	}
	/**
	 * function TableTags
	 *
	 * This method allows and/or disallows XHTML's table tags.
	 *
	 * @access public
	 */
	public function TableTags(Kses5 $Kses5) {
		// Table (DTD: Strict/Transitional/Frameset)
		$Kses5->AddHTML ( 'table', array (
				'align' => 0, // DTD: Transitional/Frameset
				'bgcolor' => 0, // DTD: Transitional/Frameset
				'border' => 1,
				'cellpadding' => 1,
				'cellspacing' => 1,
				'frame' => 1,
				'rules' => 1,
				'summary' => 1,
				'width' => 1,
				'id' => 0,
				'class' => 0,
				'title' => 0,
				'style' => 0,
				'dir' => 0,
				'lang' => 0,
				'xml:lang' => 0,
				'onclick' => 0,
				'ondblclick' => 0,
				'onmousedown' => 0,
				'onmouseup' => 0,
				'onmouseover' => 0,
				'onmousemove' => 0,
				'onmouseout' => 0,
				'onkeypress' => 0,
				'onkeydown' => 0,
				'onkeyup' => 0 
		) );
		// Table caption (DTD: Strict/Transitional/Frameset)
		$Kses5->AddHTML ( 'caption', array (
				'align' => 0, // DTD: Transitional/Frameset
				'id' => 0,
				'class' => 0,
				'title' => 0,
				'style' => 0,
				'dir' => 0,
				'lang' => 0,
				'xml:lang' => 0,
				'onclick' => 0,
				'ondblclick' => 0,
				'onmousedown' => 0,
				'onmouseup' => 0,
				'onmouseover' => 0,
				'onmousemove' => 0,
				'onmouseout' => 0,
				'onkeypress' => 0,
				'onkeydown' => 0,
				'onkeyup' => 0 
		) );
		// Table header (DTD: Strict/Transitional/Frameset)
		$Kses5->AddHTML ( 'th', array (
				'abbr' => 1,
				'align' => 1,
				'axis' => 1,
				'bgcolor' => 0, // DTD: Transitional/Frameset
				'char' => 1,
				'charoff' => 1,
				'colspan' => 1,
				'headers' => 1,
				'height' => 0, // DTD: Transitional/Frameset
				'nowrap' => 0, // DTD: Transitional/Frameset
				'rowspan' => 1,
				'scope' => 1,
				'valign' => 1,
				'width' => 0, // DTD: Transitional/Frameset
				'id' => 0,
				'class' => 0,
				'title' => 0,
				'style' => 0,
				'dir' => 0,
				'lang' => 0,
				'xml:lang' => 0,
				'onclick' => 0,
				'ondblclick' => 0,
				'onmousedown' => 0,
				'onmouseup' => 0,
				'onmouseover' => 0,
				'onmousemove' => 0,
				'onmouseout' => 0,
				'onkeypress' => 0,
				'onkeydown' => 0,
				'onkeyup' => 0 
		) );
		// Table row (DTD: Strict/Transitional/Frameset)
		$Kses5->AddHTML ( 'tr', array (
				'align' => 1,
				'bgcolor' => 0, // DTD: Transitional/Frameset
				'char' => 1,
				'charoff' => 1,
				'valign' => 1,
				'id' => 0,
				'class' => 0,
				'title' => 0,
				'style' => 0,
				'dir' => 0,
				'lang' => 0,
				'xml:lang' => 0,
				'onclick' => 0,
				'ondblclick' => 0,
				'onmousedown' => 0,
				'onmouseup' => 0,
				'onmouseover' => 0,
				'onmousemove' => 0,
				'onmouseout' => 0,
				'onkeypress' => 0,
				'onkeydown' => 0,
				'onkeyup' => 0 
		) );
		// Table cell (DTD: Strict/Transitional/Frameset)
		$Kses5->AddHTML ( 'td', array (
				'abbr' => 1,
				'align' => 1,
				'axis' => 1,
				'bgcolor' => 0, // DTD: Transitional/Frameset
				'char' => 1,
				'charoff' => 1,
				'colspan' => 1,
				'headers' => 1,
				'height' => 0, // DTD: Transitional/Frameset
				'nowrap' => 0, // DTD: Transitional/Frameset
				'rowspan' => 1,
				'scope' => 1,
				'valign' => 1,
				'width' => 0, // DTD: Transitional/Frameset
				'id' => 0,
				'class' => 0,
				'title' => 0,
				'style' => 0,
				'dir' => 0,
				'lang' => 0,
				'xml:lang' => 0,
				'onclick' => 0,
				'ondblclick' => 0,
				'onmousedown' => 0,
				'onmouseup' => 0,
				'onmouseover' => 0,
				'onmousemove' => 0,
				'onmouseout' => 0,
				'onkeypress' => 0,
				'onkeydown' => 0,
				'onkeyup' => 0 
		) );
		// Table header (DTD: Strict/Transitional/Frameset)
		$Kses5->AddHTML ( 'thead', array (
				'align' => 1,
				'char' => 1,
				'charoff' => 1,
				'valign' => 1,
				'id' => 0,
				'class' => 0,
				'title' => 0,
				'style' => 0,
				'dir' => 0,
				'lang' => 0,
				'xml:lang' => 0,
				'onclick' => 0,
				'ondblclick' => 0,
				'onmousedown' => 0,
				'onmouseup' => 0,
				'onmouseover' => 0,
				'onmousemove' => 0,
				'onmouseout' => 0,
				'onkeypress' => 0,
				'onkeydown' => 0,
				'onkeyup' => 0 
		) );
		// Table body (DTD: Strict/Transitional/Frameset)
		$Kses5->AddHTML ( 'tbody', array (
				'align' => 1,
				'char' => 1,
				'charoff' => 1,
				'valign' => 1,
				'id' => 0,
				'class' => 0,
				'title' => 0,
				'style' => 0,
				'dir' => 0,
				'lang' => 0,
				'xml:lang' => 0,
				'onclick' => 0,
				'ondblclick' => 0,
				'onmousedown' => 0,
				'onmouseup' => 0,
				'onmouseover' => 0,
				'onmousemove' => 0,
				'onmouseout' => 0,
				'onkeypress' => 0,
				'onkeydown' => 0,
				'onkeyup' => 0 
		) );
		// Table footer (DTD: Strict/Transitional/Frameset)
		$Kses5->AddHTML ( 'tfoot', array (
				'align' => 1,
				'char' => 1,
				'charoff' => 1,
				'valign' => 1,
				'id' => 0,
				'class' => 0,
				'title' => 0,
				'style' => 0,
				'dir' => 0,
				'lang' => 0,
				'xml:lang' => 0,
				'onclick' => 0,
				'ondblclick' => 0,
				'onmousedown' => 0,
				'onmouseup' => 0,
				'onmouseover' => 0,
				'onmousemove' => 0,
				'onmouseout' => 0,
				'onkeypress' => 0,
				'onkeydown' => 0,
				'onkeyup' => 0 
		) );
		// Attributes for table columns (DTD: Strict/Transitional/Frameset)
		$Kses5->AddHTML ( 'col', array (
				'align' => 1,
				'char' => 1,
				'charoff' => 1,
				'span' => 1,
				'valign' => 1,
				'width' => 1,
				'id' => 0,
				'class' => 0,
				'title' => 0,
				'style' => 0,
				'dir' => 0,
				'lang' => 0,
				'xml:lang' => 0,
				'onclick' => 0,
				'ondblclick' => 0,
				'onmousedown' => 0,
				'onmouseup' => 0,
				'onmouseover' => 0,
				'onmousemove' => 0,
				'onmouseout' => 0,
				'onkeypress' => 0,
				'onkeydown' => 0,
				'onkeyup' => 0 
		) );
		// Groups of table columns (DTD: Strict/Transitional/Frameset)
		$Kses5->AddHTML ( 'colgroup', array (
				'align' => 1,
				'char' => 1,
				'charoff' => 1,
				'span' => 1,
				'valign' => 1,
				'width' => 1,
				'id' => 0,
				'class' => 0,
				'title' => 0,
				'style' => 0,
				'dir' => 0,
				'lang' => 0,
				'xml:lang' => 0,
				'onclick' => 0,
				'ondblclick' => 0,
				'onmousedown' => 0,
				'onmouseup' => 0,
				'onmouseover' => 0,
				'onmousemove' => 0,
				'onmouseout' => 0,
				'onkeypress' => 0,
				'onkeydown' => 0,
				'onkeyup' => 0 
		) );
	}
	/**
	 * function StyleTags
	 *
	 * This method allows and/or disallows XHTML's style tags.
	 *
	 * @access public
	 */
	public function StyleTags(Kses5 $Kses5) {
		// Style definition (DTD: Strict/Transitional/Frameset)
		$Kses5->AddHTML ( 'style', array (
				'type' => 1,
				'media' => 1,
				'title' => 0,
				'dir' => 0,
				'lang' => 0,
				'xml:space' => 0 
		) );
		// Division/section (DTD: Strict/Transitional/Frameset)
		$Kses5->AddHTML ( 'div', array (
				'align' => 0, // DTD: Transitional/Frameset
				'id' => 0,
				'class' => 0,
				'title' => 0,
				'style' => 0,
				'dir' => 0,
				'lang' => 0,
				'xml:lang' => 0,
				'onclick' => 0,
				'ondblclick' => 0,
				'onmousedown' => 0,
				'onmouseup' => 0,
				'onmouseover' => 0,
				'onmousemove' => 0,
				'onmouseout' => 0,
				'onkeypress' => 0,
				'onkeydown' => 0,
				'onkeyup' => 0 
		) );
		// Group inline-elements (DTD: Strict/Transitional/Frameset)
		$Kses5->AddHTML ( 'span', array (
				'id' => 0,
				'class' => 0,
				'title' => 0,
				'style' => 0,
				'dir' => 0,
				'lang' => 0,
				'xml:lang' => 0,
				'onclick' => 0,
				'ondblclick' => 0,
				'onmousedown' => 0,
				'onmouseup' => 0,
				'onmouseover' => 0,
				'onmousemove' => 0,
				'onmouseout' => 0,
				'onkeypress' => 0,
				'onkeydown' => 0,
				'onkeyup' => 0 
		) );
	}
	/**
	 * function MetaInformationTags
	 *
	 * This method allows and/or disallows XHTML's meta information tags.
	 *
	 * @access public
	 */
	public function MetaInformationTags(Kses5 $Kses5) {
		// Header information (DTD: Strict/Transitional/Frameset)
		$Kses5->AddHTML ( 'head', array (
				'profile' => 1,
				'dir' => 0,
				'lang' => 0,
				'xml:lang' => 0 
		) );
		// Title (DTD: Strict/Transitional/Frameset)
		$Kses5->AddHTML ( 'title', array (
				'id' => 0,
				'class' => 0,
				'dir' => 0,
				'lang' => 0,
				'style' => 0,
				'xml:lang' => 0 
		) );
		// Meta information (DTD: Strict/Transitional/Frameset)
		$Kses5->AddHTML ( 'meta', array (
				'content' => 1,
				'http-equiv' => 1,
				'name' => 1,
				'scheme' => 1,
				'dir' => 0,
				'lang' => 0,
				'xml:lang' => 0 
		) );
		// Base URL for all links (DTD: Strict/Transitional/Frameset)
		$Kses5->AddHTML ( 'base', array (
				'href' => 1,
				'target' => 0 
		) ); // DTD: Transitional/Frameset

		/*
		 * Base font (DTD: Transitional/Frameset)
		 * $Kses5->AddHTML('basefont',
		 * array('color' => 0,
		 * 'face' => 0,
		 * 'size' => 0,
		 * 'id' => 0,
		 * 'class' => 0,
		 * 'title' => 0,
		 * 'style' => 0,
		 * 'dir' => 0,
		 * 'lang' => 0,
		 * 'xml:lang' => 0
		 * )
		 * );
		 */
	}
	/**
	 * function ProgrammingTags
	 *
	 * This method allows and/or disallows XHTML's programming tags.
	 *
	 * @access public
	 */
	public function ProgrammingTags(Kses5 $Kses5) {
		// Script (DTD: Strict/Transitional/Frameset)
		$Kses5->AddHTML ( 'script', array (
				'type' => 1,
				'charset' => 1,
				'defer' => 1,
				'language' => 0,
				'src' => 1,
				'xml:space' => 0 
		) );
		// Noscript section (DTD: Strict/Transitional/Frameset)
		$Kses5->AddHTML ( 'noscript', array (
				'id' => 0,
				'class' => 0,
				'title' => 0,
				'style' => 0,
				'dir' => 0,
				'lang' => 0,
				'xml:lang' => 0 
		) );
		/*
		 * Applet (DTD: Transitional/Frameset)
		 * $Kses5->AddHTML('applet',
		 * array('height' => 0,
		 * 'width' => 0,
		 * 'align' => 0,
		 * 'alt' => 0,
		 * 'archive' => 0,
		 * 'code' => 0,
		 * 'codebase' => 0,
		 * 'hspace' => 0,
		 * 'name' => 0,
		 * 'object' => 0,
		 * 'vspace' => 0,
		 * 'id' => 0,
		 * 'class' => 0,
		 * 'title' => 0,
		 * 'style' => 0,
		 * 'dir' => 0,
		 * 'lang' => 0,
		 * 'xml:lang' => 0,
		 * 'accesskey' => 0,
		 * 'tabindex' => 0,
		 * 'onclick' => 0,
		 * 'ondblclick' => 0,
		 * 'onmousedown' => 0,
		 * 'onmouseup' => 0,
		 * 'onmouseover' => 0,
		 * 'onmousemove' => 0,
		 * 'onmouseout' => 0,
		 * 'onkeypress' => 0,
		 * 'onkeydown' => 0,
		 * 'onkeyup' => 0
		 * )
		 * );
		 */
		// Embedded object (DTD: Strict/Transitional/Frameset)
		$Kses5->AddHTML ( 'object', array (
				'align' => 0, // DTD: Transitional/Frameset
				'archive' => 1,
				'border' => 0, // DTD: Transitional/Frameset
				'classid' => 1,
				'codebase' => 1,
				'codetype' => 1,
				'data' => 1,
				'declare' => 1,
				'height' => 1,
				'hspace' => 0, // DTD: Transitional/Frameset
				'name' => 1,
				'standby' => 1,
				'type' => 1,
				'usemap' => 1,
				'vspace' => 0, // DTD: Transitional/Frameset
				'width' => 1,
				'id' => 0,
				'class' => 0,
				'title' => 0,
				'style' => 0,
				'dir' => 0,
				'lang' => 0,
				'xml:lang' => 0,
				'accesskey' => 0,
				'tabindex' => 0,
				'onclick' => 0,
				'ondblclick' => 0,
				'onmousedown' => 0,
				'onmouseup' => 0,
				'onmouseover' => 0,
				'onmousemove' => 0,
				'onmouseout' => 0,
				'onkeypress' => 0,
				'onkeydown' => 0,
				'onkeyup' => 0 
		) );
		// Parameter for an object (DTD: Strict/Transitional/Frameset)
		$Kses5->AddHTML ( 'param', array (
				'name' => 1,
				'type' => 1,
				'value' => 1,
				'valuetype' => 1,
				'id' => 0 
		) );
	}
	/**
	 * function HandleRequest
	 *
	 * This method processes the request if certain conditions are met.
	 *
	 * @access public
	 * @param
	 *        	Request Request object
	 */
	public function HandleRequest(Request $Request) {
		$Kses5 = new kses5 ();
		$Kses5->Protocols ( array (
				'ftp',
				'ftps',
				'gopher',
				'http',
				'https',
				'ldap',
				'ldaps',
				'mailto',
				'news',
				'nntp',
				'telnet' 
		) );
		/*
		 * if (isset($Request->HTTP_GET)) {
		 * $this->FrameTags($Kses5);
		 * $this->InputTags($Kses5);
		 * $this->MetaInformationTags($Kses5);
		 * $this->ProgrammingTags($Kses5);
		 * $Kses5->Parse($Request->HTTP_GET);
		 * }
		 */
		if (isset ( $Request->HTTP_POST )) {
			$this->BasicTags ( $Kses5 );
			$this->CharacterFormatTags ( $Kses5 );
			$this->OutputTags ( $Kses5 );
			$this->BlockTags ( $Kses5 );
			$this->LinkTags ( $Kses5 );
			$this->ListTags ( $Kses5 );
			$this->ImageTags ( $Kses5 );
			$this->TableTags ( $Kses5 );
			$this->StyleTags ( $Kses5 );
			$Kses5->Parse ( $Request->HTTP_POST );
		}
		if (TRUE !== empty ( $this->Successor )) {
			$this->Successor->HandleRequest ( $Request );
		}
	}
}
?>
