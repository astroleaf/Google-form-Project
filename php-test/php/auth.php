class RecipeRepository {
    public function search($criteria) {
        $qb = $this->createQueryBuilder('r');
        
        if ($criteria['name']) {
            $qb->andWhere('r.name LIKE :name')
               ->setParameter('name', '%'.$criteria['name'].'%');
        }
        
        if ($criteria['vegetarian']) {
            $qb->andWhere('r.vegetarian = :veg')
               ->setParameter('veg', $criteria['vegetarian']);
        }
        
        return $qb->getQuery()->getResult();
    }
}