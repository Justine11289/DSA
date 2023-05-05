#include <iostream>
#include <ctime>
#include <cstring>
#include <queue>
using namespace std;

struct Node{
    int data;
    Node* link;
};

// 將新node連接至list中
void List(int u,int v,Node **list){
    Node *cur = list[u];
    while(cur->link != NULL){cur = cur->link;}  // 確認後方是否已有連接
    cur->link = new Node;
    cur = cur->link;
    cur->data = v;
    cur->link = NULL;
}

// 參照pseudo code做DFS的初始化與造訪過程
void DFS_visit(int **adj,int u,int n,int *color,int **visit){
    color[u] = 1;    // 表示已造訪
    cout << u << " ";
    for(int v = 0; v < n; v++){
        if((color[v] == 0) && (adj[u][v] == 1)){    // 確認是否造訪過&確認是否有邊
            color[v] = 1;   // 表示已造訪
            visit[u][v] = 1;    // 紀錄已造訪的邊
            visit[v][u] = 1;    // 因為無向圖對角對稱所以亦紀錄已造訪
            DFS_visit(adj,v,n,color,visit);
        }
    }
}

void DFS(int **adj,int n){
    int **visit = new int *[n]; // 紀錄邊是否造訪過
    int *color = new int[n]; // 紀錄點是否造訪過
	for(int i = 0; i < n; i++){
        visit[i] = new int[n];
        memset(visit[i],0,sizeof(int)*n); // 將陣列初始化為0(表未造訪過)
    }
    memset(color,0,sizeof(int)*n);   // u.color = WHITE(表未造訪過)

    cout << endl << "DFS Travel Order: ";
    for(int i = 0; i < n; i++){
		if(color[i] == 0){   // 確認是否已被造訪過
            DFS_visit(adj,i,n,color,visit);
        }
	}

    cout << endl << "DFS Matrix : " << endl;
    for(int u = 0; u < n; u++){
		for(int v = 0; v < n; v++){
		    cout << visit[u][v] << " ";
	    }
        cout << endl;
	}
    for(int i = 0; i < n; i++){delete[] visit[i];}
    delete[] visit;
    delete[] color;
}

// 參照pseudo code做BFS的初始化與造訪過程
void BFS_visit(int **adj,int n,int *color,int **visit,queue<int> *q){
    while(!q->empty()){    // 若queue仍有資料則繼續延伸廣度
        int u = q->front(); // 依照queue的順序取最前端者開始造訪
        // color[u] = 1;
        cout << u << " ";
        for(int v = 0; v < n; v++){
            if(color[v] == 0 && adj[u][v] == 1){    // 確認是否造訪過&確認是否有邊
                color[v] = 1;   // 表示已造訪
                visit[u][v] = 1;    // 紀錄已造訪的邊
                visit[v][u] = 1;    // 因為無向圖對角對稱所以亦紀錄已造訪
                q->push(v);   // 將點加入queue以後續造訪
            }
        }
        q->pop(); // 完成造訪即可移除
    }
}

void BFS(int **adj,int n){
    queue<int> q;   // 利用queue的概念實施
    int **visit = new int *[n]; // 紀錄邊是否造訪過
    int *color = new int[n]; // 紀錄點是否造訪過
	for(int i = 0; i < n; i++){
        visit[i] = new int[n];
        memset(visit[i],0,sizeof(int)*n); // 將陣列初始化為0(表未造訪過)
    }
    memset(color,0,sizeof(int)*n);   // u.color = WHITE(表未造訪過)

    cout << endl << "BFS Travel Order: ";
    for(int i = 0; i < n; i++){
		if(color[i] == 0){
            color[i] = 1;   // 表示已造訪
            q.push(i);   // 將點加入queue以前往造訪
            BFS_visit(adj,n,color,visit,&q);
        }
	}
    
    cout << endl << "BFS Matrix : " << endl;
    for(int u = 0; u < n; u++){
		for(int v = 0; v < n; v++){
		    cout << visit[u][v] << " ";
	    }
        cout << endl;
	}

    for(int i = 0; i < n; i++){delete[] visit[i];}
    delete[] visit;
    delete[] color;
}

int main(){
    int n,e;    // n為節點數 e為邊數目
    cout << "Node number : ";
	cin >> n;
	cout << "Edge number : ";
	cin >> e;
    int e_limit = (n*(n-1))/2;
    if(!(e <= e_limit)){    // 判斷e<=(Cn取2)以建無向圖
        cout << "Edge must <= (n*(n-1))/2 : ";
        cin >> e;
    }

    // 初始化建立Matrix與List
    int** adj = new int*[n];
    for(int i = 0; i < n; i++){adj[i] = new int[e];}
    for(int i = 0; i < n; i++){memset(adj[i],0,sizeof(int)*n);}
    Node **list = new Node*[n]; // 設置空間存放list
    for(int i = 0; i < n; i++){  // 初始化節點
        Node *first = new Node;
        first->data = i;
        first->link = NULL;
        list[i] = first;
    }

    // 產生無向圖
    srand(time(0));
    for(int i = 0; i < e; i++){
        int u = rand()%n;
        int v = rand()%n;
        // 欲建無向圖->矩陣對角對稱 & 為確保未重複設置->確認矩陣未設置為1
        if(u!=v && adj[u][v]!=1){   
            adj[u][v] = 1;
            List(u,v,list);
            adj[v][u] = 1;
            List(v,u,list);
        }
        else i--;
    }

    // 列印無向圖(Matrix)
    cout << endl << "Assign Matrix: " << endl;
    for(int u = 0; u < n; u++){
		for(int v = 0; v < n; v++){cout << adj[u][v] << " ";}
        cout << endl;
	}
    // 列印無向圖(List)
    cout << endl << "Assign List : " << endl;
    for(int u = 0; u < n; u++){
        cout << u << " -> ";
        Node *cur = list[u]->link; // 由u起始連接到v
        while(cur != NULL){ // 若非空則輸出Node的名稱
            cout << cur->data << " -> ";
            cur = cur->link;
        }
        cout << "NIL" << endl;  // 結尾則指向NIL
    }

    // DFS尋訪
    DFS(adj,n);
    
    // BFS尋訪  
    BFS(adj,n); 

    for(int i = 0; i < n; i++){delete[] adj[i];}
	delete[] adj;
	return 0;
}