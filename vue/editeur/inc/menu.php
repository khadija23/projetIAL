<style>
    .list-type1 {
    width: 300px;
    margin: 0;
}

.list-type1 ol {
    counter-reset: li;
    list-style: none;
    *list-style: decimal;
    font-size: 15px;
    font-family: 'Raleway', sans-serif;
    padding: 0;
    margin-bottom: 4em;
}

.list-type1 ol ol {
    margin: 0 0 0 2em;
}

.list-type1 a {
    position: relative;
    display: block;
    padding: .4em .4em .4em 2em;
    *padding: .4em;
    margin: .5em 0;
    background: linear-gradient( 90deg, rgba(246, 114, 128, 0.6));
    color: #000;
    text-decoration: none;
    -moz-border-radius: .3em;
    -webkit-border-radius: .3em;
    border-radius: 10em;
    transition: all .2s ease-in-out;
}

.list-type1 a:hover {
    background: #dd6673;
    text-decoration: none;
    transform: scale(1.1);
}

.list-type1 a:before {
    content: counter(li);
    counter-increment: li;
    position: absolute;
    left: -1.3em;
    top: 50%;
    margin-top: -1.3em;
    background: #dd6673;
    height: 2em;
    width: 2em;
    line-height: 2em;
    border: .3em solid #fff;
    text-align: center;
    font-weight: bold;
    -moz-border-radius: 2em;
    -webkit-border-radius: 2em;
    border-radius: 2em;
    color: #FFF;
}
</style>
<div  class="list-type1"> 
    
    <h1>Catégories</h1>
    <ol>
        <li><a href="../../index.php">Tout</a></li>
        <?php foreach ($categories as $categorie): ?>
            <li><a href="index.php?action=categorie&id=<?= $categorie->id ?>"><?= $categorie->libelle ?></a></li>
        <?php endforeach ?>
    </ol>
</div>

