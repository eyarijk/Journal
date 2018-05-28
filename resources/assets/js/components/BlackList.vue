<template>
    <div>
        <div class="row">
            <div class="col-md-12" v-show="this.ban.length < 1">
                <h3>Розрахунок чорного списка!</h3>
                <div class="card">
                    <div class="card-body card-block">
                        <div class="form-group">
                            <label for="group">Група</label>
                            <select id="group" v-model="group" class="form-control">
                                <option v-for="item in groups" :value="item.id">{{ item.name }}</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <div class="form-check">
                                <label for="months">Місяці</label>
                                <div id="months" class="checkbox" v-for="month in months">
                                    <label :for="'month_'+ month.key" class="form-check-label ">
                                        <input type="checkbox" :id="'month_'+ month.key" v-model="selectMonth" :value="month.key" class="form-check-input">{{ month.name }}
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="year">Рік</label>
                            <select id="year" v-model="year" class="form-control">
                                <option v-for="item in years">{{ item }}</option>
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
        <div class="row" v-show="this.ban.length > 0">
            <div class="col-md-12">
                <h3>Група: {{ getGroup(this.group) }}</h3>
                <div class="table-responsive table-responsive-data2">
                    <table class="table table-data2">
                        <thead>
                        <tr>
                            <th>Прізвище Ім'я</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr class="tr-shadow" v-for="user in ban">
                            <td>{{ user }}</td>
                        </tr>
                        <tr class="spacer"></tr>
                        </tbody>
                    </table>
                    <button @click="backStep" class="btn btn-success btn-sm">
                       Назад
                    </button>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        props:['groups','years'],
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
               group: null,
            }
        },
        mounted() {},
        methods: {
            getBlackList: function () {
                if (this.selectMonth.length < 1){
                    alert('Оберіть місяці!');
                    return false;
                }
                if (this.year == null){
                    alert('Оберіть рік!');
                    return false;
                }
                if (this.group == null){
                    alert('Оберіть групу!');
                    return false;
                }

                this.$http.post('/api/black-list?group=' + this.group,{year:this.year, months:this.selectMonth }).then(function(response) {
                    if (response.data.ban.length < 1){
                        alert('Чорний список пустий!');
                        this.ban = [];
                    } else {
                        this.ban = response.data.ban;
                    }
                }, function (error) {
                    console.log(error);
                });
            },
            backStep: function() {
                this.ban = [];
                this.selectMonth = [];
                this.year = null;
                this.group = null;
            },
            getGroup: function (id) {
              for (var i = 0; i < this.groups.length; i++){
                  if (this.groups[i].id == id) {
                      return this.groups[i].name;
                  }
              }
            },
        }
    }
</script>
