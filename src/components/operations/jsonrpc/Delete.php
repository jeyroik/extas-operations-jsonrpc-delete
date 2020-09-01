<?php
namespace extas\components\operations\jsonrpc;

use extas\components\api\jsonrpc\operations\OperationRunner;
use extas\components\exceptions\MissedOrUnknown;
use extas\interfaces\IHasName;
use extas\interfaces\IItem;
use extas\interfaces\operations\IJsonRpcOperation;

/**
 * Class Delete
 *
 * @package extas\components\operations\jsonrpc
 * @author jeyroik@gmail.com
 */
class Delete extends OperationRunner
{
    /**
     * @return array
     * @throws MissedOrUnknown
     */
    public function run(): array
    {
        /**
         * @var IJsonRpcOperation $op
         */
        $op = $this->getOperation();
        /**
         * @var $item IItem|IHasName
         */
        $repo = $op->getItemRepository();
        $request = $this->getJsonRpcRequest();
        $exist = $repo->all($request->getData());

        if (!$exist) {
            throw new MissedOrUnknown($op->getItemName(), 404);
        }

        $deleted = $repo->delete($request->getData());
        $result = $deleted ? $this->prepareResult($exist) : [];

        return [
            'items' => $result,
            'total' => count($result)
        ];
    }

    /**
     * @param array $exist
     * @return array
     */
    protected function prepareResult(array $exist): array
    {
        $result = [];
        foreach ($exist as $item) {
            $result[] = $item->__toArray();
        }

        return $result;
    }

    /**
     * @return string
     */
    protected function getSubjectForExtension(): string
    {
        return 'extas.operations.jsonrpc.update';
    }
}
