#include <iostream>
#include <cstring>
using namespace std;

int main(){
    int x;
    cin >> x;

    // 宣告放置名字的空間(尚無法確定字串長度)
    char** name = new char*[x];
    for(int i = 0; i < x; i++){
        name[i] = new char[1000];
    }
    // 讀取輸入名單
    cin.get();


    int length = 0;
	for(int i = 0; i < x; i++){
        // 讀取字串(可以讀取空格)
        cin.getline(name[i], 100);
        if(strlen(name[i]) > length){
            length = strlen(name[i]);
        }
	}

    // 檢測空格的位置
    int location = 0;
	for(int i = 0; i < x; i++){
		for(int j = 0; j < length; j++){
			if(name[i][j] == ' '&& j > location){
				location = j;
                break;
			}
		}	
	}

    // 將名字的空格對齊
    int spaces = 0;
    for(int i = 0; i < x; i++){
        for(int j = 0; j < length; j++){
            if(name[i][j] == ' '){
                spaces = location - j;
			    break;
            }
        }
        for(int k = 0; k < spaces; k++){
            cout << ' ';
        }
        cout << name[i] << endl; 
    }
	
    // 刪除先前宣告之空間
    for(int i = 0 ; i < x; i++){
		delete[] name[i];
	}
	delete[] name;
	return 0;
} 