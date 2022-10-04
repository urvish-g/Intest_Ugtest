<?php
 
namespace Intest\Ugtest\Setup;
 
use Magento\Framework\Setup\InstallDataInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\ModuleDataSetupInterface;
 
class InstallData implements InstallDataInterface
{
 
    public function install(ModuleDataSetupInterface $setup, ModuleContextInterface $context)
    {
        $setup->startSetup();
 
        $tableName = $setup->getTable('ajaxcall');
        
        if (!$setup->getConnection()->isTableExists($tableName) == true) {
            $om = \Magento\Framework\App\ObjectManager::getInstance();
            $connectionO = $om->create('Magento\Framework\App\ResourceConnection');
            $connection= $connectionO->getConnection();

            $sql = "CREATE TABLE ajaxcall (id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,    username VARCHAR(100) ) ENGINE=InnoDB;";
            $connection->query($sql);
        }
        $setup->endSetup();
    }
}