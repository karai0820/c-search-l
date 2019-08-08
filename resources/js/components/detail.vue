//詳細ページ
<template>
    <main role="main">
    <div class="container">
        <h1 class="jumbotron-heading">Structure Detail</h1>
    <div class="row">
    <div class="col-md-12 mx-auto">
    {{$route.params.name}}
    <div class="searchDetail">
        //化合物名
        <h2 class="col-md-12">化合物名/L-No.:{{$route.params.name.compound_name}}</h2>
        //構造結果
        <div id="jsme_container5"></div>


        //パラメータ 
        <table class="table">
        <thead>
            <tr>
            <th width="30%"></th>
            </tr>
        </thead>
        <tbody>
            <tr>
            <th>合成者</th>
            <td>{{$route.params.name.chemist}}</td>
            </tr> 
            <tr>
            <th>登録日</th>
            <td>{{$route.params.name.created_at}}</td>
            </tr>   
        </tbody>    
        </table>

        <router-link :to="{name:'edit',params:{name:$route.params.name}}">Edit</router-link>

            <table cellpadding="5" cellspacing="5">
            <thead> 
            <tr>
                <th>試験タイトル</th>
                <th>試験日</th>
                <th>試験規模</th>
                <th>濃度</th>
                <th>ECHCG</th>
                <th>ORYSP_1</th>
                <th>ORYSP_3</th>
                <th>symptom</th>
                <th>comment</th>
            </tr> 
        </thead>
        <tbody>
            <tr>
            <td>{{methodData.test_title}}</td>
            <td>{{methodData.test_day}}</td>
            <td>{{methodData.test_scale}}</td>
            <td>{{methodData.concentration}}{{methodData.conc_unit}}</td>
            <td>{{paddyData.ECHCG}}</td>
            <td>{{paddyData.ORYSP_1}}</td>
            <td>{{paddyData.ORYSP_3}}</td>
            <td>{{paddyData.symptom}}</td>
            <td>{{paddyData.comment}}</td>
            </tr> 
        </tbody>    
        </table>
 
      
        {{methodData}}
        {{paddyData}}
        {{uplandData}}
        {{arr}}
    </div>
    </div>
  </div>
  </div>
</div>
</main>
</template>
<script>
export default {
   
    data(){
        return{
            methodData:{
                id:'',
                compound_id:'',
                test_area:'',
                test_title:'',
                test_day:'',
                test_scale:'',
                concentration:'',
                conc_unit:''
        },
            paddyData:{
                id:'',
                compound_id:'',
                method_id:'',
                mode_of_action:'',
                ECHCG:'',
                ORYSP_1:'',
                ORYSP_3:'',
                symptom:'',
                comment:'',
                author:'',
                updater:'',
                created_at:'',
                updated_at:'',
            },
            uplandData:{
                id:'',
                compound_id:'',
                method_id:'',
                mode_of_action:'',
                ECHUT:'',
                DIGAD:'',
                ZEAMD:'',
                TRZAX:'',
                symptom:'',
                comment:'',
                author:'',
                updater:'',
                created_at:'',
                updated_at:'',
            },
            arr:'',
        }
    },
    mounted(){
    this.$nextTick(()=>{this.getMethod();});
    this.$nextTick(()=>{this.getPaddy();});
    this.$nextTick(()=>{this.getUpland();});
    this.$nextTick(()=>{this.getSession();});
    this.$nextTick(()=>{this.Jsme();});

    },
    methods:{
        getMethod() {
            axios.get('/api/methods')
            .then( ( res ) => {
                this.methodData = res.data.data;
            });
            },
        getPaddy() {
            axios.get('/api/paddies')
            .then( ( res ) => {
                this.paddyData = res.data.data;
            });
            },
        getUpland() {
            axios.get('/api/uplands')
            .then( ( res ) => {
                this.uplandData = res.data.data;
            });
            },
         getSession(){
            this.arr = window.sessionStorage.getItem('arr');
         },
         Jsme(){
            let jsmeApplet5 = new JSApplet.JSME("jsme_container5", "240px", "200px", {"options" : "depict"});
            let mol = this.$route.params.name.structure;
            jsmeApplet5.readMolFile(mol);
         }   


}
}
</script>

<style>

</style>