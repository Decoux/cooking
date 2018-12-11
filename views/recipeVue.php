<?php
include("template/header.php")
?>
<section>

        <div class="flex-wrap mt-5 p-3 d-flex justify-content-center">
            
            <?php if(isset($arrayOfObjRecipe)){foreach($arrayOfObjRecipe as $recipe){ ?>
                <div class="card m-2" style="width: 18rem;">
                    <img class="card-img-top" src="<?= $path ?>/assets/img/<?php echo $recipe->getPicture(); ?>" alt="Card image cap">
                    <a class="card-body" href="<?= $path ?>/recipe_description/<?php echo $recipe->getId(); ?>">
                        <div class="">
                            <p class="text-center text-white font-weight-bold card-text"><?php echo $recipe->getNamerecipe(); ?></p>
                        </div>
                    </a>
                </div>
            <?php } } ?>
            </div>
            
</section>

<?php
include("template/footer.php")
?>