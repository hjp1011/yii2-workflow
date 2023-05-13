<?php
namespace tests\codeception\unit\models;

use Yii;
use yii\db\BaseActiveRecord;
use yii\db\QueryBuilder;
use yii\db\Query;
use hjp1011\workflow\base\Status;
use hjp1011\workflow\base\IStatusAccessor;
use yii\base\Exception;

class StatusAccessor07 implements IStatusAccessor
{
	public static $instanceCount = 0;

	public $callGetStatusCount = 0;
	public $callCommitStatusCount = 0;
	public $callSetStatusCount = 0;

	public $callSetStatusLastArg = [];
	public $statusToReturnOnGet = null;

	private $_status;

	public function __construct()
	{
		StatusAccessor07::$instanceCount++;
	}
	public function resetCallCounters()
	{
		$this->callGetStatusCount = 0;
		$this->callCommitStatusCount = 0;
		$this->callSetStatusCount = 0;
		$this->callSetStatusLastArg = [];
	}
	/**
	 * (non-PHPdoc)
	 * @see \hjp1011\workflow\IStatusAccessor::getStatus()
	 */
	public function readStatus(BaseActiveRecord $model) {
		$this->callGetStatusCount++;
		return $this->statusToReturnOnGet;
	}

	/**
	 * (non-PHPdoc)
	 * @see \hjp1011\workflow\IStatusAccessor::commitStatus()
	 */
	public function commitStatus($model)
	{
		$this->callCommitStatusCount++;

	}
	/**
	 * (non-PHPdoc)
	 * @see \hjp1011\workflow\IStatusAccessor::setStatus()
	 */
	public function updateStatus(BaseActiveRecord $model, Status $status = null) {
		$this->callSetStatusCount++;
		$this->callSetStatusLastArg = [$model, $status];
	}
}