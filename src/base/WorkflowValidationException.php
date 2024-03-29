<?php
namespace hjp1011\workflow\base;

use Yii;
use yii\base\Exception;

/**
 * WorkflowValidationException represents an exception related to workflow validation performed
 * by Workflow Source component and related PHP array Parsers.
 * 
 * @see \hjp1011\workflow\source\file\WorkflowFileSource
 *
 */
class WorkflowValidationException extends Exception
{
	/**
	 * @return string the user-friendly name of this exception
	 */
	public function getName()
	{
		return 'Workflow Validation Exception';
	}
}
