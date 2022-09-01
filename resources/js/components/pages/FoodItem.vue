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
                <div class="d-flex mb-1 w-100">
                    <div class="btn btn-group-toggle p-0 w-25">
                        <label class="btn active">
                            <input type="radio" name="options" id="small" autocomplete="off" checked>Small
                        </label>
                    </div>
                    <div class="btn btn-group-toggle p-0 w-50">
                        <label class="btn w-100">
                            <input type="radio" name="options" id="medium" autocomplete="off" checked>Medium
                        </label>
                    </div>
                    <div class="btn btn-group-toggle p-0 ml-0 w-25">
                        <label class="btn">
                            <input type="radio" name="options" id="large" autocomplete="off" checked>Large
                        </label>
                    </div>
                </div>
                <div class="d-flex mb-3 w-100">
                    <div class="btn btn-group-toggle p-0 w-50">
                        <label class="btn active w-100">
                            <input type="radio" name="options" id="standart" autocomplete="off" checked>Standart
                        </label>
                    </div>
                    <div class="btn btn-group-toggle p-0 w-50">
                        <label class="btn w-100">
                            <input type="radio" name="options" id="thin" autocomplete="off" checked>Thin
                        </label>
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
        label{
            font-size: 10px;
            border: 1px solid lightgray;
            margin-top: 0;
        }
        .size{
            flex-basis: 0;
            flex-grow: 1;
        }
        .active{
            color: #FE696A;
            border-color: #FE696A;
        }
    }
</style>
