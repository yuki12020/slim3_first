<?php
use Slim\App;
use Slim\Http\Request;
use Slim\Http\Response;

return function (App $app) {
	
	//出来てる
    $container = $app->getContainer();
    $app->get('/point/', function (Request $request, Response $response, array $args) use ($container) {
        // Sample log message
        $container->get('logger')->info("Slim-Skeleton '/' route");
        // Render index view
        return $container->get('renderer')->render($response, 'point.phtml', $args);
    });

	//出来てる
	 $app->get('/index/', function (Request $request, Response $response, array $args) use ($container) {
        // Sample log message
        $container->get('logger')->info("Slim-Skeleton '/' route");
        // Render index view
        return $container->get('renderer')->render($response, 'index.phtml', $args);
    });
	
	//出来てる
	 $app->get('/book_api', function (Request $request, Response $response, array $args) use ($container) {
		 error_reporting(0);
		  $mapper = new TestMapper($this->db);
		  $test = $mapper->getTests();

		  ob_start();
		  var_dump($test);
		  $t = ob_get_contents();
		  ob_end_clean();
		  var_dump($test);

		  return $response;
   });
   
   //出来てる
	$app->get('/book_api2', function ($request, $response, $args) {
	  $mapper = new TestMapper($this->db);
	  $test = $mapper->getTests();
	  $response = $this->renderer->render($response, "book_api.phtml", ["data" => $mapper]);
	});
	
	
};


   //下の、出来てない。
//ポイントの購入、出金履歴
$app->map(['GET', 'POST'], '/point/', function (Request $request, Response $response, array $args) {
    //$this->logger->info("Slim-Skeleton '/' route");
    $mapper = new PointClass($this->db);
    $response = $this->renderer->render($response, "index.phtml", ["data" => $mapper]);
});
