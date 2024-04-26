import { useNews } from "../../hooks/use-news";
import { PaginationComponent } from "../pagination/pagination-component";
import styles from "./news-component.module.scss";

export function NewsComponent() {
  const { news: articles, newsPagination, getDataOfPage } = useNews();

  return (
    <div className={styles['container-custom']}>
      <div className={styles['grid-custom']}>
        {articles.length === 0 && "There is no more news"}
        {articles.map((article, articleIndex) => (
          <div className="card" key={`article-${articleIndex}`}>
            <img
              src={article.urlImage}
              className="card-img-top"
              alt={article.title}
            />
            <div className="card-body">
              <h5 className="card-title">{article.title}</h5>
              <p className="card-text">{article.author}</p>
            </div>
          </div>
        ))}
      </div>

      {newsPagination && (
        <PaginationComponent
          pagination={newsPagination}
          getDataOfPage={getDataOfPage}
        />
      )}
    </div>
  );
}
