//詳細ページ
<template>
    <main role="main">
    <div class="container">
        <h1 class="jumbotron-heading">Structure Detail</h1>
    <div class="row">
    <div class="col-md-12 mx-auto">
    <!--全データ{{$route.params.name}}-->
    <div class="searchDetail">
        //化合物名
        <h2 class="col-md-12">化合物名/L-No.:{{getData.compound_name}}</h2>
        //構造結果
        <div id="jsme_container4"></div>


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
            <td>{{getData.chemist}}</td>
            </tr> 
            <tr>
            <th>登録日</th>
            <td>{{getData.created_at}}</td>
            </tr>   
        </tbody>    
        </table>

        <router-link :to="{name:'edit',params:{name:getData.id}}">Edit</router-link>

            <table class="methodtable" cellpadding="5" cellspacing="5">
            <thead> 
            <tr>
                <th>試験タイトル</th>
                <th>試験日</th>
                <th>試験規模</th>
                <th>濃度</th>
            </tr> 
            </thead>
            <tbody>
            <tr v-for="methodData in methodData">    
            <td>{{methodData.test_title}}</td>
            <td>{{methodData.test_day}}</td>
            <td>{{methodData.test_scale}}</td>
            <td>{{methodData.concentration}}{{methodData.conc_unit}}</td>
            </tr>
        </tbody>    

        </table>
        
        <table class="paddytable" cellpadding="5" cellspacing="5">
            <thead> 
            <tr>
                <th>ECHCG</th>
                <th>ORYSP_1</th>
                <th>ORYSP_3</th>
                <th>symptom</th>
                <th>comment</th>
            </tr> 
        </thead>
        <tbody>
            <tr v-for="paddyData in paddyData"> 
            <td>{{paddyData.ECHCG}}</td>
            <td>{{paddyData.ORYSP_1}}</td>
            <td>{{paddyData.ORYSP_3}}</td>
            <td>{{paddyData.symptom}}</td>
            <td>{{paddyData.comment}}</td>
            </tr>   
        </tbody>    
        </table>
    </div>
    </div>
  </div>
  </div>
</div>
{{methodData}}
{{paddyData}}
</main>

</template>
<script>
export default {
name:'detail',
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
            getData:'',
        }
    },
    created(){
    this.$nextTick(()=>{this.getSession();});
    },
    mounted(){
    this.$nextTick(()=>{this.Jsme();});
    this.$nextTick(()=>{this.getPaddy();});
    this.$nextTick(()=>{this.getUpland();});

    },
    methods:{
         getSession(){
            this.getData = JSON.parse(sessionStorage.getItem('arr'));
         },
         getPaddy() {
            let sessionData = JSON.parse(sessionStorage.getItem('arr'));
            var self = this;


            axios.get('/api/methods')
            .then( (res) => {
                this.methodData = res.data.data.filter(function(element){
                    return element.compound_id == sessionData.id;
                });
            });

            axios.get('/api/paddies')
            .then( ( res ) => {
                this.paddyData = res.data.data.filter(function(element){
                    return element.compound_id == sessionData.id ;
                });
            });
            },
        getUpland(){
            let sessionData = JSON.parse(sessionStorage.getItem('arr'));
            axios.get('/api/uplands')
            .then( ( res ) => {
                this.uplandData = res.data.data.filter(function(element){
                    return element.compound_id == sessionData.id;
            });
            });
            },
        session(){
            sessionStorage.setItem('arr',JSON.stringify(this.getData));
         },
        
         Jsme(){
            jsmeApplet4 = new JSApplet.JSME("jsme_container4", "240px", "200px", {"options" : "depict"});
            let mol = this.getData.structure;
            jsmeApplet4.readMolFile(mol);
         }   


}
}
</script>

<style>

</style>