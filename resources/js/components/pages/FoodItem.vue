<template>
    <div class="col-lg-3 col-md-4 col-sm-6 pb-2">
        <div class="food-item card pb-2">
            <a href="#">
                <img src="../../../../public/image/typologies/tipology_07.jpg" alt="Pizza">
            </a>
            <div class="food-description card-body">
                <h5 class="fs-md">Pizza Vegan Delux</h5>
                <p class="fs-ms text-muted">
                    Broccoli, Mushrooms, Bell pepper, Corn, Onion, Mozzarella, Parmesan
                </p>
                <div class="d-flex mb-1">
                    <div class="form-check form-option form-check-justified mb2">
                        <input class="form-check-input" type="radio" name="size1" id="s1" checked>
                        <label class="form-option-label border rounded border-danger" for="s1">Small</label>
                    </div>
                    <div class="form-check form-option form-check-justified mb2">
                        <input class="form-check-input" type="radio" name="size1" id="m1" checked>
                        <label class="form-option-label" for="m1">Medium</label>
                    </div>
                    <div class="form-check form-option form-check-justified mb2">
                        <input class="form-check-input" type="radio" name="size1" id="l1" checked>
                        <label class="form-option-label" for="l1">Large</label>
                    </div>
                </div>
                <div class="d-flex mb-3">
                    <div class="form-check form-option form-check-justified mb2">
                        <input class="form-check-input" type="radio" name="base1" id="standart1" checked>
                        <label class="form-option-label" for="standart1">Standart</label>
                    </div>
                    <div class="form-check form-option form-check-justified mb2">
                        <input class="form-check-input" type="radio" name="base1" id="thin1" checked>
                        <label class="form-option-label" for="thin1">Thin</label>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
export default {
    name: "FoodItem"
}
</script>
<style lang="scss" scoped>
    .food-item{
        width: 100%;
        border-radius: 5px;
        img{
            width: 100%;
        }
    }
</style>
