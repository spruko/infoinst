<?php

namespace laravelLara\infoinst\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Helper\Installer\InstallFileCreate;
use App\Helper\Installer\DatabaseManager;
use laravelLara\infoinst\utils\MigrationHelper;
use laravelLara\infoinst\utils\DatabaseManagement;
use laravelLara\infoinst\utils\InstallFileCreator;

class DataUpdateController extends Controller
{
    use MigrationHelper;

    public function index(){

        return view('Installation::installer.update.welcome');
    }

    /**
     * Display the updater overview page.
     *
     * @return \Illuminate\View\View
     */
    public function overview()
    {
        $migrations = $this->getMigrations();
        $dbMigrations = $this->getExecutedMigrations();

        return view('Installation::installer.update.overview', ['numberOfUpdatesPending' => count($migrations) - count($dbMigrations)]);
    }

    /**
     * Migrate and seed the database.
     *
     * @return \Illuminate\View\View
     */
    public function database()
    {
        $databaseManager = new DatabaseManagement;
        $response = $databaseManager->migrateAndSeed();
        return redirect()->route('SprukoUpdater::final')
                         ->with(['message' => $response]);
    }

    /**
     * Update installed file and display finished view.
     *
     * @param InstalledFileManager $fileManager
     * @return \Illuminate\View\View
     */
    public function finish(InstallFileCreator $fileManager)
    {
        $fileManager->update();

        return view('Installation::installer.update.final');
    }
}
