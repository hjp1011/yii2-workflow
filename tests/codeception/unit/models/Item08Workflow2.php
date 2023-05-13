<?php
namespace tests\codeception\unit\models;

use Yii;
use hjp1011\workflow\source\file\IWorkflowDefinitionProvider;

class Item08Workflow2 implements IWorkflowDefinitionProvider 
{
    public function getDefinition() {
        return [ 
            'initialStatusId' => 'success',
            'status' => [
                'success' => [
                    'transition' => ['onHold']
                ],
                'onHold' => [
                    'transition' => ['success']
                ],
            ]
        ];
    }
}