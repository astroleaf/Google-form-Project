// config/routes.php
$router->get('/recipes', [RecipeController::class, 'list']);
$router->post('/recipes', [RecipeController::class, 'create']);
$router->get('/recipes/{id:\d+}', [RecipeController::class, 'get']);
$router->put('/recipes/{id:\d+}', [RecipeController::class, 'update']);
$router->delete('/recipes/{id:\d+}', [RecipeController::class, 'delete']);
$router->post('/recipes/{id:\d+}/rating', [RatingController::class, 'create']);