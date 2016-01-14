<?php
/**
 * interface Standars Backend
 * 
 * Esta interfaz estandariza los controladores del backend
 * 
 * @author  Ivan Lopez Lopez
 * @example class Controller_Administrator_Demo extends Controller_Core_Backend implements Standars_Backend 
 *
 */
interface Standars_Backend {
	
	public function action_index();
	
	public function action_add();
	
	public function action_edit();
	
	public function action_delete();
	
}