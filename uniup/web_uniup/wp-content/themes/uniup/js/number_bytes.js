
	function fnChkByte(obj, maxByte){
		var str = obj.value;
		var str_len = str.length;

		var rbyte = 0;
		var rlen = 0;
		var one_char = "";
		var str2 = "";
		
		for(var i=0; i<str_len; i++){
		one_char = str.charAt(i);

		//////////////////////////////////////

		 

		if(one_char.match(/[가-힣ㄱ-ㅎㅏ-ㅣ]/)){
			//한글2Byte -> 3byte
			rbyte += 3;                                         
		}else if(one_char.match(/[a-zA-Z]/)){
			//영문2Byte
			rbyte +=2;                                            
		}else if(one_char.match(/[^가-힣ㄱ-ㅎㅏ-ㅣa-z]/)){
			//나머지1Byte
			rbyte ++;
		}


		//////////////////////////////////////
		

		if(rbyte <= maxByte){
			rlen = i+1;                                          //return할 문자열 갯수
		}
		}




		if(rbyte > maxByte){
			//alert("한글"+"/ 영문 "+maxByte+"자를 초과 입력할 수 없습니다.");
			swal("한글"+"/ 영문 "+maxByte+"자를 초과하여 입력할 수 없습니다.");
			str2 = str.substr(0,rlen);                                  //문자열 자르기
			obj.value = str2;
			fnChkByte(obj, maxByte);
		}else{
			document.getElementById('byteInfo').innerText = rbyte;
		}
		}
