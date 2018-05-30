<template>
    <div>
        <ul class="nav nav-tabs">
            <li class="nav-item">
                <span class="nav-link tab-span" :class="getClass('rating')" @click="setStep('rating')">Рейтинг</span>
            </li>
            <li class="nav-item">
                <span class="nav-link tab-span" :class="getClass('extra')" @click="setStep('extra')">Додаткові бали</span>
            </li>
            <li class="nav-item">
                <span class="nav-link tab-span" :class="getClass('all')" @click="setStep('all')">Загальний рейтинг</span>
            </li>
        </ul>
        <div class="table-responsive table-responsive-data2" v-show="step == 'rating'">
            <table class="table table-data2">
                <thead>
                <tr>
                    <th>П.І.</th>
                    <th v-for="item in subjects">{{ item.subject.name }}</th>
                </tr>
                </thead>
                <tbody>
                    <tr class="tr-shadow" v-for="item in tables">
                        <td>{{ item.student.last_name }} {{ item.student.first_name }}</td>
                        <td v-for="rating in item.subjects"><input @keyup.enter="saveNumber(rating.rating,item.student.id,rating.subject.id)" v-model="rating.rating" style="text-align: center;border: 1px solid #ccc;width: 30px;" type="text"></td>
                    </tr>
                    <tr class="spacer"></tr>
                </tbody>
            </table>
        </div>
        <div class="table-responsive table-responsive-data2"  v-show="step == 'extra'">
            <table class="table table-data2">
                <thead>
                <tr>
                    <th>П.І.</th>
                    <th>Додатковий бал</th>
                </tr>
                </thead>
                <tbody>
                <tr class="tr-shadow" v-for="item in tables">
                    <td>{{ item.student.last_name }} {{ item.student.first_name }}</td>
                    <td><input @keyup.enter="saveExtra(item.extra,item.student.id)" v-model="item.extra" style="text-align: center;border: 1px solid #ccc;width: 30px;" type="text"></td>
                </tr>
                <tr class="spacer"></tr>
                </tbody>
            </table>
        </div>
        <div class="table-responsive table-responsive-data2" v-show="step == 'all'">
            <table class="table table-data2">
                <thead>
                <tr>
                    <th>П.І.</th>
                    <th>Загальний рейтинг</th>
                </tr>
                </thead>
                <tbody>
                <tr class="tr-shadow" v-for="item in tables">
                    <td>{{ item.student.last_name }} {{ item.student.first_name }}</td>
                    <td v-text=" getAll(item)"></td>
                </tr>
                <tr class="spacer"></tr>
                </tbody>
            </table>
        </div>
    </div>
</template>

<script>
    export default {
        props:['teacher','ratings','subjects','year','semester'],
        data: function () {
            return {
                tables: this.ratings,
                step: 'rating',
            }
        },
        mounted() {

        },
        methods: {
            saveNumber: function (number,student,subject) {
                this.$http.post('/api/rating/save?year=' + this.year + '&semester=' + this.month + '&semester=' + this.semester,{ number:number,subject:subject,student:student }).then(function(response) {

                }, function (error) {
                    console.log(error);
                });
            },
            saveExtra: function (extra,student) {
                alert(extra);
            },
            setStep: function (step) {
                this.step = step
            },
            getClass: function (step) {
                if (this.step == step)
                    return 'active';
                return '';
            },
            getAll: function (item,key) {
                var subjects = 0;
                for (var i = 0; i < item.subjects.length;i++){
                    subjects += Number(item.subjects[i].rating);
                }
                subjects /= item.subjects.length;
                subjects *=  0.9;

                var total = (Number(subjects) + Number(item.extra));
                item.all = total;

                return total;
            },
        }
    }
</script>
