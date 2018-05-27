<template>
    <div>
        <div class="row">
            <div class="col-md-12">
                    <div class="card">
                        <div class="card-body card-block">
                            <div class="form-group">
                                <div class="form-check">
                                    <div class="checkbox">
                                        <label for="checkbox1" class="form-check-label ">
                                            <input type="checkbox" id="checkbox1" name="checkbox1" value="option1" class="form-check-input">Option 1
                                        </label>
                                    </div>
                                    <div class="checkbox">
                                        <label for="checkbox2" class="form-check-label ">
                                            <input type="checkbox" id="checkbox2" name="checkbox2" value="option2" class="form-check-input"> Option 2
                                        </label>
                                    </div>
                                    <div class="checkbox">
                                        <label for="checkbox3" class="form-check-label ">
                                            <input type="checkbox" id="checkbox3" name="checkbox3" value="option3" class="form-check-input"> Option 3
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-success btn-sm">
                                <i class="fa fa-users"></i> Створити
                            </button>
                        </div>
                    </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        props:[],
        data: function () {
            return {
               months: [
                   {
                       name: 'Січень',
                       key: 1,
                   },
                   {
                       name: 'Лютий',
                       key: 2,
                   },
                   {
                       name: 'Березень',
                       key: 3,
                   },
                   {
                       name: 'Квітень',
                       key: 4,
                   }
                   ,{
                       name: 'Травень',
                       key: 5,
                   }
                   ,{
                       name: 'Червень',
                       key: 6,
                   }
                   ,{
                       name: '',
                       key: 9,
                   }
               ],
            }
        },
        mounted() {},
        methods: {}
    }
</script>
