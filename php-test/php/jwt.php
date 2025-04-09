class AuthMiddleware {
    public function handle(Request $request) {
        $authHeader = $request->getHeader('Authorization');
        
        if (!preg_match('/Bearer\s(\S+)/', $authHeader, $matches)) {
            throw new UnauthorizedHttpException('Missing token');
        }
        
        try {
            JWT::decode($matches[1], getenv('JWT_SECRET'), ['HS256']);
        } catch (\Exception $e) {
            throw new UnauthorizedHttpException('Invalid token');
        }
    }
}