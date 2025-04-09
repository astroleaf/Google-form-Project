class RecipeEndpointTest extends TestCase {
    public function testCreateRecipe() {
        $client = new ApiClient();
        $response = $client->post('/recipes', [
            'name' => 'Test Recipe',
            'prepTime' => 30,
            'difficulty' => 2,
            'vegetarian' => true
        ], ['Authorization' => 'Bearer valid_token']);
        
        $this->assertEquals(201, $response->getStatusCode());
        $this->assertArrayHasKey('id', $response->getJson());
    }
}