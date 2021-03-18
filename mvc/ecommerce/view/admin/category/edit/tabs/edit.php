<?php 

$category = $this->getCategory();
$status =$this->getOption();
$categoryOptions = $this->getCategoryOptions();
// print_r($categoryOptions);
// print_r($parentCategorys->getData());die();
?>
<h2>Add/Edit</h2>

<table class="table">
        <select name="category[parentId]">
            <?php if($category): ?>
            <?php foreach ($categoryOptions as $categoryId => $name): ?>
                <option value="<?php echo $categoryId; ?>" <?php if($categoryId == $category->parentId): ?>selected <?php endif;?>><?php echo $name; ?></option>
            <?php endforeach;?>
            <?php endif; ?>
        </select>
        <tr>
            <td><label for="categoryName">CategoryName</label></td>
            <td><input type="text"  name="category[categoryName]" value="<?php echo $category->categoryName; ?>"></td>
        </tr>
        <tr>
            <td><label for="Description">Description</label></td>
            <td><input type="text" name="category[categoryDescription]" value="<?php echo $category->categoryDescription; ?>" ></td>
        </tr>
        <tr>
            <td><label for ="Status">Status</label></td>
            <td>
                <select name="category[status]">
                    <option >Select</option>
                    <?php foreach ($status as $key => $value) {?><option value="<?php echo $key ?>"><?php echo $value ?></option><?php } ?>
                </select>
            </td>
         </tr>
        <?php 
        if(!$category->id){
            $value = 'save';
        }else{$value = 'update';}?>

            <td><input class="btn btn-success" type="submit" value="<?php echo $value;?>"></td>
        </tr>
    
    </table>