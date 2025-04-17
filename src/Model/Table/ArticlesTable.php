<?php
// src/Model/Table/ArticlesTable.php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Table;
// the Text class is used to create slugs
use Cake\Utility\Text;
// the EventInterface is used to create slugs
use Cake\Event\EventInterface;

class ArticlesTable extends Table
{
    public function initialize(array $config): void
    {
        parent::initialize($config);
        $this->addBehavior('Timestamp');
    }

    public function beforeSave(EventInterface $event, $entity, \ArrayObject $options)
    {
       if ($entity->isNew() && !$entity->slug) {
            $sluggedTitle = Text::slug($entity->title);
            // trim slug to maximum length defined in schema
            $entity->slug = substr($sluggedTitle, 0, 191);
        }
    }
}
