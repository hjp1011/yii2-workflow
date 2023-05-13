<?php
namespace hjp1011\workflow\source\file;

/**
 * This interface must be implemented by any PHP class that
 * is able to provide a workflow definition. 
 */
interface IWorkflowDefinitionProvider
{
	/**
	 * Returns the workflow definition in the form of an array.
	 * @return array
	 */
	public function getDefinition();
}
