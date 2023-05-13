<?php
namespace hjp1011\workflow\base;

/**
 * Interface implemented by Workflow objects.
 */
interface WorkflowInterface
{
	/**
	 * Returns the id of this workflow
	 * 
	 * @return string the workflow id
	 */
	public function getId();
	/**
	 * Returns the id of the initial status for this workflow.
	 *
	 * @return string status id
	 */
	public function getInitialStatusId();
	
	/**
	 * Returns the initial status instance for this workflow.
	 * 
	 * @return \hjp1011\workflow\base\StatusInterface the initial status instance
	 * @throws \hjp1011\workflow\base\WorkflowException when no source component is available
	 */
	public function getInitialStatus();
	/**
	 * Returns an array containing all Status instances belonging to this workflow.
	 * 
	 * @return \hjp1011\workflow\base\StatusInterface[]  status list belonging to this workflow
	 * @throws \hjp1011\workflow\base\WorkflowException when no source component is available
	 */
	public function getAllStatuses();	
}
