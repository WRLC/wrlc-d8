<?php

namespace Drupal\migrate_tools_test\Commands;

use Drupal\migrate\MigrateMessage;
use Drupal\migrate\Plugin\MigrationPluginManager;
use Drupal\migrate_tools\MigrateBatchExecutable;
use Drush\Commands\DrushCommands;

/**
 * Migrate Tools Test drush commands.
 */
class MigrateToolsTestCommands extends DrushCommands {

  /**
   * Migration plugin manager service.
   *
   * @var \Drupal\migrate\Plugin\MigrationPluginManager
   */
  protected $migrationPluginManager;

  /**
   * MigrateToolsTestCommands constructor.
   *
   * @param \Drupal\migrate\Plugin\MigrationPluginManager $migrationPluginManager
   *   The Migration Plugin Manager.
   */
  public function __construct(MigrationPluginManager $migrationPluginManager) {
    parent::__construct();
    $this->migrationPluginManager = $migrationPluginManager;
  }

  /**
   * Run a batch import of fruit terms as a test.
   *
   * @command migrate:batch-import-fruit
   */
  public function batchImportFruit() {
    $fruit_migration = $this->migrationPluginManager->createInstance('fruit_terms');
    $executable = new MigrateBatchExecutable($fruit_migration, new MigrateMessage());
    $executable->batchImport();
    drush_backend_batch_process();
  }

}
