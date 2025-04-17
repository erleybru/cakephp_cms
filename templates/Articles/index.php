<!-- File: templates/Articles/index.php -->

<h1>Articles</h1>
<?= $this->Html->link('Add Article', ['action' => 'add']) ?>
<table>
    <thead>
        <tr>
            <th>Title</th>
            <th>Created</th>
        </tr>
    </thead>

    <!-- Here is where we iterate through our $articles query object, printing out article info -->
    <tbody>
        <?php foreach ($articles as $article): ?>
        <tr>
            <td><?= $this->Html->link($article->title, ['action' => 'view', $article->slug]) ?></td>
            <td><?= $article->created->format(DATE_RFC850) ?></td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>
