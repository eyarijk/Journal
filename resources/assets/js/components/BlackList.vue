<template>
    <div>
        <div class="row">
            <div class="col-md-12">
                <h3>Група: {{ couple.group.name}}</h3>
                <div class="card">
                    <div class="card-body card-block">
                        <div class="form-group">
                            <div class="form-check">
                                <div class="checkbox" v-for="month in months">
                                    <label :for="'month_'+ month.key" class="form-check-label ">
                                        <input type="checkbox" :id="'month_'+ month.key" v-model="selectMonth" :value="month.key" class="form-check-input">{{ month.name }}
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <select v-model="year" class="form-control">
                                <option>2018</option>
                                <option>2017</option>
                            </select>
                        </div>
                    </div>

                    <div class="card-footer">
                        <button @click="getBlackList" class="btn btn-success btn-sm">
                            <i class="fa fa-users"></i> Отримати чорний список
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="table-responsive table-responsive-data2">
                    <table class="table table-data2">
                        <thead>
                        <tr>
                            <th>П.І.</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr class="tr-shadow">
                            <td></td>
                        </tr>
                        <tr class="spacer"></tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        props:['couple'],
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
                       name: 'Вересень',
                       key: 9,
                   }
                   ,{
                       name: 'Жовтень',
                       key: 10,
                   }
                   ,{
                       name: 'Листопад',
                       key: 11,
                   }
                   ,{
                       name: 'Грудень',
                       key: 12,
                   }
               ],
               selectMonth: [],
               year: null,
               ban: [],
            }
        },
        mounted() {},
        methods: {
            getBlackList: function () {
                if (this.selectMonth.length < 1){
                    alert('Оберіть місяці!');
                    return false;
                }

                this.$http.post('/api/black-list/?group=' + this.couple.group.id,{year:this.year, months:this.selectMonth }).then(function(response) {
                    if (response.data.ban.length < 1){
                        alert('Чорний список пустий!');
                    } else {
                        this.ban = response.data.ban;
                    }
                }, function (error) {
                    console.log(error);
                });
            }
        }
    }
</script>
