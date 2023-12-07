class AutoTag {
    constructor() {
        // 옵시디언 태그에 진입을 어떻게 하지??
        // 폴더가 있나
        // 안에 정보가 어떻게 되어있나 알아야지 for 구문이 결정된다
        this.arr_t = tp.file.tags
    }
    autotag(t) {
        for( this.arr_t of tag ){
            
            if(tag.include(t)){
                t = tag;
            }
        }
    }
}