<?php
namespace CesarMartins\Pdfpreview\Model\ResourceModel;

use Magento\Framework\App\ResourceConnection;

class Data
{
    /**
     * @var ResourceConnection
     */
    private $resourceConnection;

    public function __construct(
        ResourceConnection $resourceConnection
    ) {
        $this->resourceConnection = $resourceConnection;
    }

    /**
     * Select query to fetch records
     *
     * @return array
     */
    public function selectQuery()
    {
        $tableName = $this->resourceConnection->getTableName('core_config_data');

        //Initiate Connection
        $connection = $this->resourceConnection->getConnection();
        $path = 'general/locale/code';
        $scope = 'default';

        $select = $connection->select()
            ->from(
                ['c' => $tableName],
                ['*']
            )
            ->where(
                "c.path = :path"
            )->where(
                "c.scope = :scope"
            );
        $bind = ['path'=>$path, 'scope'=>$scope];
        $records = $connection->fetchAll($select, $bind);

        return $records;
    }
}
