//編集ページ
<template>
    <main role="main">
    <div class="container">
        <h1 class="jumbotron-heading">Structure Detail</h1>
    <div class="row">
    <div class="col-md-12 mx-auto">
    
    <div class="searchDetail">
        //化合物名
        <h2 class="col-md-12">化合物名/L-No.:{{compoundDetail.compound_name}}</h2>
        //構造結果
        <div id="jsme_container2"></div>
        <param name="mol" value="">//jsmeへの値の入れ方を考える。
        
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
            <td>{{compoundDetail.author}}</td>
            </tr> 
            <tr>
            <th>登録日</th>
            <td>{{}}</td>
            </tr>   
        </tbody>    
        </table>
　　</div>
<form class="searchform" @submit.prevent="Search">
    <div lass="form-layout">
      <ul class="form-content">
          <li>
            <label class="col-md-12" for="compound_name">化合物名/L-No.</label>
                <input type ='text' class ="form-control" name="compound_name" v-model="compounds.compound_name">
          </li>
          <li>
            <label class="col-md-12" for="created_at">登録年月日</label>
                <input type ='date' class ="form-control" name="created_at" v-model="compounds.date">
          </li>
          <li>
          <label class="col-md-12" for="author">作成者</label>
            <input type ='text' class ="form-control" name="author" v-model="compounds.author">
          </li>
    </ul>
   </div>
   
   <div id="search-area"></div>
   <button type='submit'>Search</button>

    </form>
  
  </div>
  </div>
</div>
</main>
</template>
<script>
export default {
    props:['compound.id'],
    data: function( ) {
        return {
            compoundDetail:[
            {compound_name:'',author:''}
            ]
        }
    },
    mounted(){
    this.$nextTick(()=>{this.getItem();});
    },
  updated(){
    this.$nextTick(()=>{this.jsme();});
    },
    methods:{
        getItem() {
            axios.get('/api/compounds/'+this.compound.id)
            .then( ( res ) => {
                this.compoundDetail = res.data.data;
            });
  
            },
    jsme(){
    var mol = "O=C(O)c4cn(C1CC1)c3cc(N2CCNCC2)c(F)cc3c4=O |JME 2000.10 Mon Nov 06 13:13:26 GMT+01:00 2000 || 24 27                            V2000 |    3.9755   -8.0947    0.0000 O                               |    7.6150  -10.1944    0.0000 O                               |    5.1953  -10.1944    0.0000 O                               |   12.4643   -8.7946    0.0000 F                               |   10.0346   -8.7946    0.0000 C                               |   10.0346   -5.9950    0.0000 C                               |    6.4051   -6.6949    0.0000 C                               |   13.6741   -3.8953    0.0000 C                               |   14.8839   -5.9950    0.0000 C                               |    6.9151   -3.3754    0.0000 C                               |    8.3149   -3.3754    0.0000 C                               |   12.4643   -4.5952    0.0000 C                               |   13.6741   -6.6949    0.0000 C                               |   14.8839   -4.5952    0.0000 N                               |    5.1953   -8.7946    0.0000 C                               |   11.2544   -8.0947    0.0000 C                               |    6.4051   -8.0947    0.0000 C                               |   11.2544   -6.6949    0.0000 C                               |    7.6150   -8.7946    0.0000 C                               |    8.8248   -8.0947    0.0000 C                               |    8.8248   -6.6949    0.0000 C                               |    7.6150   -4.5952    0.0000 C                               |   12.4643   -5.9950    0.0000 N                               |    7.6150   -5.9950    0.0000 N                               |  1 15  2  0         |  2 19  2  0         |  3 15  1  0         |  4 16  1  0         |  5 16  1  0         |  5 20  2  0         |  6 18  1  0         |  6 21  2  0         |  7 17  2  0         |  7 24  1  0         |  8 12  1  0         |  8 14  1  0         |  9 13  1  0         |  9 14  1  0         | 10 11  1  0         | 10 22  1  0         | 11 22  1  0         | 12 23  1  0         | 13 23  1  0         | 15 17  1  0         | 16 18  2  0         | 17 19  1  0         | 18 23  1  0         | 19 20  1  0         | 20 21  1  0         | 21 24  1  0         | 22 24  1  0         |M  END ";
    jsmeApplet2.readMolFile(mol);
}
}
}
</script>

<style>

</style>