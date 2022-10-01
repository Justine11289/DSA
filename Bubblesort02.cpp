#include <iostream>
#include <cstring>
using namespace std;

int main(){
    int x, y;
    cin >> x >> y;

    // 宣告放置名字的空間
    char** name = new char*[x];

    // 宣告放置字串的空間
    for(int i = 0; i < x; i++){
        name[i] = new char[y+1] ;
    }

    // 放入字串
    for(int i = 0; i < x; i++){
        cin >> *(name + i);
        // 確認字串長度
        while(strlen(*(name + i)) > y){
            cout << "The string is too long. Please enter again." << endl;
            cin >> *(name + i);
        }
    }

    // Bubble Sort
    for(int i = 0; i < x; i++){
        for(int j = 0; j < x - i - 1; j++){
            if((**(name + j)) < (**(name + j + 1))){
                char* tmp = *(name + j);
                *(name + j) = *(name + j + 1);
                *(name + j + 1) = tmp;
            }
        }
    }
    
    for(int i = 0; i < x; i++){
        cout << *(name + i)  << endl;
    }
    
    // 刪除先前宣告之空間
    for(int i = 0; i < x; i++){
        delete[] name[i];
    }
    delete[] name;
    return 0;
}