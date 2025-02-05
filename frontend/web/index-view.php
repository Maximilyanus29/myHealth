<?php



//soups
$zavtrak = dbGet("SELECT * FROM recipe r
JOIN recipes_to_category rtc ON rtc.recipe_id = r.id
WHERE rtc.category_id in (SELECT id FROM category WHERE slug = 'zavtraki')
ORDER BY RAND()
LIMIT 10");


$soups = dbGet("SELECT * FROM recipe r
JOIN recipes_to_category rtc ON rtc.recipe_id = r.id
WHERE rtc.category_id in (SELECT id FROM category WHERE slug in ('supy'))
ORDER BY RAND()
LIMIT 10;");


$salad = dbGet("SELECT * FROM recipe r
JOIN recipes_to_category rtc ON rtc.recipe_id = r.id
WHERE rtc.category_id in (SELECT id FROM category WHERE slug in ('salaty'))
ORDER BY RAND()
LIMIT 10;");


$osnova = dbGet("SELECT * FROM recipe r
JOIN recipes_to_category rtc ON rtc.recipe_id = r.id
WHERE rtc.category_id in (SELECT id FROM category WHERE slug in ('osnovnye-bliuda'))
ORDER BY RAND()
LIMIT 10;");


$decert = dbGet("SELECT * FROM recipe r
JOIN recipes_to_category rtc ON rtc.recipe_id = r.id
WHERE rtc.category_id in (SELECT id FROM category WHERE slug in ('vypecka-i-deserty'))
ORDER BY RAND()
LIMIT 10;");



$napitok = dbGet("SELECT * FROM recipe r
JOIN recipes_to_category rtc ON rtc.recipe_id = r.id
WHERE rtc.category_id in (SELECT id FROM category WHERE slug in ('napitki', 'kokteili', 'konfety', 'moxito'))
ORDER BY RAND()
LIMIT 10;");

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>


<ul class="nav nav-tabs" id="myTab" role="tablist">
    <li class="nav-item" role="presentation">
        <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#1-tab-pane" type="button" role="tab" aria-controls="home-tab-pane" aria-selected="true">Завтрак</button>
    </li>
    <li class="nav-item" role="presentation">
        <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#2-tab-pane" type="button" role="tab" aria-controls="profile-tab-pane" aria-selected="false">Суп</button>
    </li>
    <li class="nav-item" role="presentation">
        <button class="nav-link" id="contact-tab" data-bs-toggle="tab" data-bs-target="#3-tab-pane" type="button" role="tab" aria-controls="contact-tab-pane" aria-selected="false">Салат</button>
    </li>
    <li class="nav-item" role="presentation">
        <button class="nav-link" id="disabled-tab" data-bs-toggle="tab" data-bs-target="#4-tab-pane" type="button" role="tab" aria-controls="disabled-tab-pane" aria-selected="false" >Основа</button>
    </li>
    <li class="nav-item" role="presentation">
        <button class="nav-link" id="disabled-tab" data-bs-toggle="tab" data-bs-target="#5-tab-pane" type="button" role="tab" aria-controls="disabled-tab-pane" aria-selected="false" >Десерт</button>
    </li>
    <li class="nav-item" role="presentation">
        <button class="nav-link" id="disabled-tab" data-bs-toggle="tab" data-bs-target="#6-tab-pane" type="button" role="tab" aria-controls="disabled-tab-pane" aria-selected="false" >Напиток</button>
    </li>
</ul>
<div class="tab-content" id="myTabContent">
    <div class="tab-pane fade show active" id="1-tab-pane" role="tabpanel" aria-labelledby="home-tab" tabindex="0">
        <ul>
        <?php foreach ($zavtrak as $zavtrak) :?>
            <li><a href="https://eda.ru/<?= $zavtrak['link_to_origin'] ?>"><?= $zavtrak['name'] ?></a></li>
        <?php endforeach; ?>
        </ul>
    </div>
    <div class="tab-pane fade" id="2-tab-pane" role="tabpanel" aria-labelledby="profile-tab" tabindex="0">        <ul>
            <?php foreach ($soups as $zavtrak) :?>
                <li><a href="https://eda.ru/<?= $zavtrak['link_to_origin'] ?>"><?= $zavtrak['name'] ?></a></li>
            <?php endforeach; ?>
        </ul>
    </div>
    <div class="tab-pane fade" id="3-tab-pane" role="tabpanel" aria-labelledby="contact-tab" tabindex="0">
        <ul>
            <?php foreach ($salad as $zavtrak) :?>
                <li><a href="https://eda.ru/<?= $zavtrak['link_to_origin'] ?>"><?= $zavtrak['name'] ?></a></li>
            <?php endforeach; ?>
        </ul>
    </div>
    <div class="tab-pane fade" id="4-tab-pane" role="tabpanel" aria-labelledby="disabled-tab" tabindex="0">
        <ul>
            <?php foreach ($osnova as $zavtrak) :?>
                <li><a href="https://eda.ru/<?= $zavtrak['link_to_origin'] ?>"><?= $zavtrak['name'] ?></a></li>
            <?php endforeach; ?>
        </ul>
    </div>
    <div class="tab-pane fade" id="5-tab-pane" role="tabpanel" aria-labelledby="disabled-tab" tabindex="0">
        <ul>
            <?php foreach ($decert as $zavtrak) :?>
                <li><a href="https://eda.ru/<?= $zavtrak['link_to_origin'] ?>"><?= $zavtrak['name'] ?></a></li>
            <?php endforeach; ?>
        </ul>
    </div>
    <div class="tab-pane fade" id="6-tab-pane" role="tabpanel" aria-labelledby="disabled-tab" tabindex="0">
        <ul>
            <?php foreach ($napitok as $zavtrak) :?>
                <li><a href="https://eda.ru/<?= $zavtrak['link_to_origin'] ?>"><?= $zavtrak['name'] ?></a></li>
            <?php endforeach; ?>
        </ul>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
