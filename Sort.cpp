#include <iostream>
#include <cmath>
#include <ctime>
using namespace std;

//Quick Sort
void QuickSort(int* A,int l,int r){
    if(l < r){
        int i = l, j = r+1 , pivot = A[l];
        do{ // 選出樞紐後子陣列與其比較大小
            do{i++;}while(A[i] < pivot); 
            do{j--;}while(A[j] > pivot);
            if(i < j){swap(A[i],A[j]);}
        }while(i < j);
        swap(A[l],A[j]); 
        QuickSort(A, l, j-1);
        QuickSort(A, j+1, r);
    }
}
//Merge Sort
void Merge(int* init,int* merged,const int l,int m,int n){  
	int i1,i2,iResult;
	for(i1 = l, iResult = l, i2 = m+1; (i1 <= m)&&(i2 <= n); iResult++){        //比較兩個陣列(i1,i2)數值大小並合併
		if(init[i1] <= init[i2]){ //一整個initList中的i1<=一整個initList中的i2
            merged[iResult] = init[i1];
			i1++;
		}
		else{   //比較出數值小的往前移
			merged[iResult] = init[i2];
			i2++;
		}
	}
	copy(init+i1,init+m+1,merged+iResult);  //如果i1陣列還有資料
	copy(init+i2,init+n+1,merged+iResult);  //如果i2陣列還有資料
}

void MergePass(int* init,int* result,int n,int s){
	int i;
	for(i = 1; i <= (n-2*s+1); i+=2*s){ //i是第一個合併中的子串列的第一個位置 ,i<=(n-2*s+1)表足夠給兩個長度為s的子串列用 
		Merge(init,result,i,i+s-1,i+2*s-1);
	}
	if((i+s-1)<n){Merge(init,result,i,i+s-1,n);}
	else{copy(init+i,init+n+1,result+i);}  //把陣列複製到 resultList
}

void MergeSort(int* A,int n){
	int* tmp = new int[n+1];
	for(int l = 1; l < n; l = l*2){ //l=目前合併中子串列的長度 
		MergePass(A,tmp,n,l);
		l=l*2;
		MergePass(tmp,A,n,l);   //交換a和tempList 
	}
	delete[] tmp;
}
//Heap Sort
void Adjust(int* A,int root,int n){
    int r = A[root];
    int i;
    for (i = (2*root); i <= n; i*=2){
        if (i < n && A[i] < A[i+1]) i++; // i為其父之最大子
        if (r >= A[i]) break; // r可插入成為i之父
        A[i/2] = A[i]; // 把第i個node往上移
    }
    A[i/2] = r;
}

void HeapSort(int* A,int n){
    // 堆疊
    for (int i = (n/2); i >= 0; i--){Adjust(A, i, n);}
    // 排序
    for (int j = (n-1); j >= 0; j--){
        swap(A[0], A[j+1]); // 首末交換
        Adjust(A, 0, j); // 堆疊
    }
}

int main(){
    int n;
    cout << "Sort how many number : " << endl;
    cin >> n;
    int Time = 100000/n;
    double Start, End;
    srand(time(NULL));
    int *A = new int[n+1];
    A[0] = 0; 
    int tmp1[n+1],tmp2[n+1];
    for(int i = 1; i <= n; i++){A[i] = (rand()*2)%50000+1;}
    for(int i = 1; i <= n; i++){
        tmp1[i] = A[i];
        tmp2[i] = A[i];
    }
    int kind = 0;
    cout << "Which kind of sort?(1:Quick 2:Merge 3:Heap) : " << endl;
    cin >> kind;
    if(kind == 1){
        Start = clock();
        for(int i = 0; i < Time; i++){QuickSort(A,0,n);}
        End = clock();
        for(int i = 1; i < n+1; i++){cout << A[i] << " ";}
    }
    else if(kind == 2){
        Start = clock();
        for(int i = 0; i < Time; i++){MergeSort(tmp1,n+1);}
        End = clock();
        for(int i = 1; i < n+1; i++){cout << tmp1[i] << " ";}
    }
    else if(kind == 3){
        Start = clock();
        for(int i = 0; i < Time; i++){HeapSort(tmp2,n+1);}
        End = clock();
        for(int i = 1; i < n+1; i++){cout << tmp2[i] << " ";}
    }
    else{cout << "Wrong Input" << endl;}

    double Total = ((End-Start)/CLOCKS_PER_SEC)/Time;
    cout << "Total Time : " << Total << " sec" << endl;
    return 0;
}
