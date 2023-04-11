function formatStringPrice(money){
    money_str = money.toString().split("").reverse().join("");
    len = Math.round(money_str.length/3);
    str_ = "";
    if(len < 0){
        return money_str;
    }else{
        for(let i = 0; i <= len; i++){
            if(i < len){
                str_ += money_str.substring(i*3, i*3+3)+".";
            }else{
                str_ += money_str.substring(i*3, i*3+3);
            }
        }
    }
    str_final = str_.split("").reverse().join("")+"đ";
    return str_final.charAt(0) === "." ? str_final.substring(1) : str_final;
}