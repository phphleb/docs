<?php
/**
 * Routing for a project with documentation.
 *
 * Маршрутизация для проекта с документацией.
 */

use App\Controllers\Docs\{AboutController,
    ConfigurationController,
    ConsoleController,
    Container\ContainerController,
    Container\ContainerDiController,
    Container\ContainerGetController,
    Controllers\ControllerController,
    Controllers\MiddlewareController,
    Controllers\ModuleController,
    Data\SearchDataController,
    DirectoryController,
    EventController,
    Extra\Extended\Async\AsyncInterfaceController,
    Extra\Extended\Console\BowlingGameController,
    Extra\Extended\Console\TaskArgController,
    Extra\Extended\Console\TaskNameController,
    Extra\Extended\Container\AddServiceController,
    Extra\Extended\Container\AddSpecialController,
    Extra\Extended\Container\ReplaceServiceController,
    Extra\Extended\Console\GenerateMvcController,
    Extra\Extended\WebConsoleController,
    Extra\Libraries\AdminpanController,
    Extra\Libraries\ApiController,
    Extra\Libraries\HloginController,
    Extra\TestingController,
    FunctionController,
    InstallationController,
    IntroductionController,
    ModelController,
    RouteController,
    SearchController,
    Service\CacheController,
    Service\ConverterController,
    Service\CookiesController,
    Service\CsrfController,
    Service\DbController,
    Service\LogController,
    Service\PathController,
    Service\RedirectController,
    Service\RequestController,
    Service\ResponseController,
    Service\RouterController,
    Service\SessionController,
    Service\SettingsController,
    Start\ApacheServerController,
    Start\HostingServerController,
    Start\NginxServerController,
    Start\PhpServerController,
    Start\RoadrunnerServerController,
    Start\SwooleServerController,
    Templates\CachedTemplateController,
    Templates\StandardTemplateController,
    Templates\TwigTemplateController,
    TitleController,
    TuningController};


Route::get('/', view('/docs/index.page.php'))->name('docs.index.page');

Route::toGroup()
    ->prefix('/{lang}/2/0/')
    ->where(['lang' => 'ru|en|zh']);

    Route::get('/title')
        ->page('docsv20', TitleController::class)
        ->name('docs.2.0.title.page');

    Route::get('/introduction')
        ->page('docsv20', IntroductionController::class)
        ->name('docs.2.0.introduction.page');

    Route::get('/search')
        ->page('docsv20', SearchController::class)
        ->name('docs.2.0.search.page');

    Route::get('/installation')
        ->page('docsv20', InstallationController::class)
        ->name('docs.2.0.installation.page');

    Route::get('/settings')
        ->page('docsv20', TuningController::class)
        ->name('docs.2.0.tuning.page');

    Route::get('/configuration')
        ->page('docsv20', ConfigurationController::class)
        ->name('docs.2.0.configuration.page');

    Route::get('/directories')
        ->page('docsv20', DirectoryController::class)
        ->name('docs.2.0.directories.page');

    Route::get('/about')
        ->page('docsv20', AboutController::class)
        ->name('docs.2.0.about.page');

    Route::get('/start/php')
        ->page('docsv20', PhpServerController::class)
        ->name('docs.2.0.start.php-server.page');

    Route::get('/start/nginx')
        ->page('docsv20', NginxServerController::class)
        ->name('docs.2.0.start.nginx.page');

    Route::get('/start/apache')
        ->page('docsv20', ApacheServerController::class)
        ->name('docs.2.0.start.apache.page');

    Route::get('/start/roadrunner')
        ->page('docsv20', RoadrunnerServerController::class)
        ->name('docs.2.0.start.roadrunner.page');

    Route::get('/start/hosting')
        ->page('docsv20', HostingServerController::class)
        ->name('docs.2.0.start.hosting.page');

    Route::get('/start/swoole')
        ->page('docsv20', SwooleServerController::class)
        ->name('docs.2.0.start.swoole.page');

    Route::get('/routing')
        ->page('docsv20', RouteController::class)
        ->name('docs.2.0.routes.page');

    Route::get('/controller/controller')
        ->page('docsv20', ControllerController::class)
        ->name('docs.2.0.controller.controller.page');

    Route::get('/controller/module')
        ->page('docsv20', ModuleController::class)
        ->name('docs.2.0.controller.module.page');

    Route::get('/controller/middleware')
        ->page('docsv20', MiddlewareController::class)
        ->name('docs.2.0.controller.middleware.page');

    Route::get('/models')
        ->page('docsv20', ModelController::class)
        ->name('docs.2.0.models.page');

    Route::get('/template/standard')
        ->page('docsv20', StandardTemplateController::class)
        ->name('docs.2.0.template.standard.page');

    Route::get('/template/cached')
        ->page('docsv20', CachedTemplateController::class)
        ->name('docs.2.0.template.cached.page');

    Route::get('/template/twig')
        ->page('docsv20', TwigTemplateController::class)
        ->name('docs.2.0.template.twig.page');

    Route::get('/console/command')
        ->page('docsv20', ConsoleController::class)
        ->name('docs.2.0.console.command.page');

    Route::get('/events')
        ->page('docsv20', EventController::class)
        ->name('docs.2.0.events.page');

    Route::get('/functions')
        ->page('docsv20', FunctionController::class)
        ->name('docs.2.0.functions.page');

    Route::get('/container/container')
        ->page('docsv20', ContainerController::class)
        ->name('docs.2.0.container.container.page');

    Route::get('/container/get')
        ->page('docsv20', ContainerGetController::class)
        ->name('docs.2.0.container.get.page');

    Route::get('/container/di')
        ->page('docsv20', ContainerDiController::class)
        ->name('docs.2.0.container.di.page');

    Route::get('/container/request')
        ->page('docsv20', RequestController::class)
        ->name('docs.2.0.service.request.page');

    Route::get('/container/response')
        ->page('docsv20', ResponseController::class)
        ->name('docs.2.0.service.response.page');

    Route::get('/container/cache')
        ->page('docsv20', CacheController::class)
        ->name('docs.2.0.service.cache.page');

    Route::get('/container/log')
        ->page('docsv20', LogController::class)
        ->name('docs.2.0.service.log.page');

    Route::get('/container/path')
        ->page('docsv20', PathController::class)
        ->name('docs.2.0.service.path.page');

    Route::get('/container/database')
        ->page('docsv20', DbController::class)
        ->name('docs.2.0.service.db.page');

    Route::get('/container/session')
        ->page('docsv20', SessionController::class)
        ->name('docs.2.0.service.session.page');

    Route::get('/container/cookies')
        ->page('docsv20', CookiesController::class)
        ->name('docs.2.0.service.cookies.page');

    Route::get('/container/redirect')
        ->page('docsv20', RedirectController::class)
        ->name('docs.2.0.service.redirect.page');

    Route::get('/container/router')
        ->page('docsv20', RouterController::class)
        ->name('docs.2.0.service.router.page');

    Route::get('/container/settings')
        ->page('docsv20', SettingsController::class)
        ->name('docs.2.0.service.settings.page');

    Route::get('/container/csrf')
        ->page('docsv20', CsrfController::class)
        ->name('docs.2.0.service.csrf.page');

    Route::get('/container/converter')
        ->page('docsv20', ConverterController::class)
        ->name('docs.2.0.service.converter.page');


    Route::toGroup()
        ->prefix('/extend');

        Route::get('/async/interface')
            ->page('docsv20', AsyncInterfaceController::class)
            ->name('docs.2.0.async.async.interface.page');

        Route::get('/console/name')
            ->page('docsv20', TaskNameController::class)
            ->name('docs.2.0.task.extended.name.page');

        Route::get('/console/arguments')
            ->page('docsv20', TaskArgController::class)
            ->name('docs.2.0.task.extended.args.page');

        Route::get('/console/bowling')
            ->page('docsv20', BowlingGameController::class)
            ->name('docs.2.0.console.bowling.page');

        Route::get('/container/replace')
            ->page('docsv20', ReplaceServiceController::class)
            ->name('docs.2.0.container.extended.replace.page');

        Route::get('/container/add')
            ->page('docsv20', AddServiceController::class)
            ->name('docs.2.0.container.extended.add.page');

        Route::get('/container/special')
            ->page('docsv20', AddSpecialController::class)
            ->name('docs.2.0.container.extended.prof.page');

        Route::get('/web/console')
            ->page('docsv20', WebConsoleController::class)
            ->name('docs.2.0.web.console.page');

        Route::get('/generate/mvc')
            ->page('docsv20', GenerateMvcController::class)
            ->name('docs.2.0.generate.mvc.page');

        Route::get('/phphleb/hlogin')
            ->page('docsv20', HloginController::class)
            ->name('docs.2.0.hlogin.page');

        Route::get('/phphleb/adminpan')
            ->page('docsv20', AdminpanController::class)
            ->name('docs.2.0.adminpan.page');

        Route::get('/phphleb/api')
            ->page('docsv20', ApiController::class)
            ->name('docs.2.0.api.page');

        Route::get('/phphleb/testing')
            ->page('docsv20', TestingController::class)
            ->name('docs.2.0.testing.page');

    Route::endGroup();

Route::endGroup();

//Route::toGroup()
//    ->prefix('/{lang}/2/1/')
//    ->where(['lang' => 'ru']);
//
//Route::get('/title')
//    ->page('docsv21', TitleController::class)
//    ->name('docs.2.1.title.page');
//Route::endGroup();


Route::post('/search/data')
    ->controller(SearchDataController::class)
    ->name('docs.search.data')
    ->protect();
