/**
 * @Entity @Table(name="recipes")
 */
class Recipe {
    /** @Id @Column(type="integer") @GeneratedValue */
    private $id;
    
    /** @Column(type="string") */
    private $name;
    
    /** @Column(type="integer") */
    private $prepTime;
    
    /** @Column(type="integer") */
    private $difficulty;
    
    /** @Column(type="boolean") */
    private $vegetarian;
    
    /** @OneToMany(targetEntity="Rating", mappedBy="recipe") */
    private $ratings;
}