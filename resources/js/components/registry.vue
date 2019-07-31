//登録ページ
<template>
 <main role="main">
    <div class="container">
        <h1 class="jumbotron-heading">Activity Registry</h1>
    <div class="row">
    <div class="col-md-12 mx-auto">
     <h2 class="col-md-12">化合物名/L-No.:{{$route.params.name}}</h2>
    //入力フォーム
    <form class="searchform" v-on:submit.prevent="register">
   
    //パラメータ入力    
    <ul class="form-content">
          <li>
            <label class="col-md-12" for="test_area">試験分野</label>
            <input type ='text' class ="form-control" name="test_area" v-model="test_area">
          </li>
          <li>
            <label class="col-md-12" for="test_title">試験タイトル</label>
            <input type ='text' class ="form-control" name="test_title" v-model="test_title">
          </li>
          <li>
            <label class="col-md-12" for="test_day">試験日</label>
            <input type ='text' class ="form-control" name="test_day" v-model="test_day">
          </li>
          <li>
            <label class="col-md-12" for="test_scale">試験規模</label>
            <input type ='text' class ="form-control" name="test_scale" v-model="test_scale">
          </li>
          <li>
            <label class="col-md-12" for="concentration">試験濃度</label>
            <input type ='text' class ="form-control" name="concentration" v-model="concentration">
          </li>
          <li>
            <label class="col-md-12" for="conc_unit">薬量単位</label>
            <input type ='text' class ="form-control" name="conc_unit" v-model="conc_unit">
          </li>
          <li>
            <label class="col-md-12" for="mode_of_action">作用機作</label>
            <input type ='text' class ="form-control" name="mode_of_action" v-model="mode_of_action">
          </li>
          <li>
            <label class="col-md-12" for="ECHCG">ノビエ</label>
            <input type ='text' class ="form-control" name="ECHCG" v-model="ECHCG">
          </li>
          <li>
            <label class="col-md-12" for="ORYSP_1">イネ1cm移植</label>
            <input type ='text' class ="form-control" name="ORYSP_1" v-model="ORYSP_1">
          </li>
          <li>
            <label class="col-md-12" for="ORYSP_3">イネ3cm移植</label>
            <input type ='text' class ="form-control" name="ORYSP_3" v-model="ORYSP_3">
          </li>
          <li>
            <label class="col-md-12" for="symptom">薬徴</label>
            <input type ='text' class ="form-control" name="symptom" v-model="symptom">
          </li>
          <li>
            <label class="col-md-12" for="comment">備考</label>
            <input type ='text' class ="form-control" name="comment" v-model="comment">
          </li>
    </ul>
    //登録ボタン
    <button type="submit" class="button button--inverse">register</button>
　　</form>


  </div>
  </div>
  </div>
</main>
</template>

<script>
export default {
    data() {
        return {
            saved: false,
            test_area:'',
            test_title:'',
            test_day:'',
            test_scale:'',
            concentration:'',
            conc_unit:'',
            mode_of_action:'',
            ECHCG:'',
            ORYSP_1:'',
            ORYSP_3:'',
            symptom:'',
            comment:'',
            author:'',
            updater:'',
        }
    },
    methods: {
        register() {
            alert(this.test_area);
            alert(this.test_title);
            alert(this.test_day);
            alert(this.concentration);
            alert(this.conc_unit);

            var methodParams = new URLSearchParams();
            methodParams.append('test_area',this.test_area);
            methodParams.append('test_title',this.test_title); 
            methodParams.append('test_day',this.test_day);
            methodParams.append('test_day',this.test_scale);
            methodParams.append('concentration',this.concentration);
            methodParams.append('conc_unit',this.conc_unit);

            var paddyParams = new URLSearchParams();
            paddyParams.append('mode_of_action',this.mode_of_action);
            paddyParams.append('ECHCG',this.ECHCG); 
            paddyParams.append('ORYSP_1',this.ORYSP_1);
            paddyParams.append('ORYSP_3',this.ORYSP_3);
            paddyParams.append('symptom',this.symptom);
            paddyParams.append('comment',this.comment);
            paddyParams.append('author',this.author);
            paddyParams.append('updater',this.updater);

            axios.post('/api/methods',methodParams)
            .then((res) => {
                this.test_area = '';
                this.test_title ='';
                this.test_day = '';
                this.test_scale='';
                this.concentration = '';
                this.conc_unit = '';
                this.saved = true;
                })
                .catch(error => {
                console.log(error)
                });

            axios.post('/api/paddyHerbicides',paddyParams)
            .then((res) => {
                this.mode_of_action = '';
                this.ECHCG ='';
                this.ORYSP_1 = '';
                this.ORYSP_3 = '';
                this.symptom = '';
                this.comment = '';
                this.author = '';
                this.updater = '';
                this.saved = true;
                }) 
            .catch(error => {
                console.log(error)
                
            });
        }
    },
    }
</script>