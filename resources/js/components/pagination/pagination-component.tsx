import { Pagination } from "../../types/pagination.interface"
import cn from "classnames";
import { PaginationLink } from "../../types/pagination-link.interface";

interface PaginationComponentProps<T> {
  pagination: Omit<Pagination<T>, 'data'>;
  getDataOfPage: (url: string) => void;
}

export function PaginationComponent<T>(paginationComponentProps: PaginationComponentProps<T>) {
  const { pagination, getDataOfPage } = paginationComponentProps;

  if (pagination.total === 0) return <div />;

  const handleGoToPage = ({ active, url }: PaginationLink) => {
    if (!url || active) return;
    getDataOfPage(url);
  }

  return (
    <div>
      <nav className="d-flex justify-content-between">
        <ul className="pagination">
          {pagination.links.map((link, index) =>
            link.url ? (
              <li
                key={index}
                className={cn('page-item', { active: link.active })}
              >
                <button
                  className="page-link"
                  onClick={() => handleGoToPage(link)}
                  dangerouslySetInnerHTML={{ __html: link.label }}
                />
              </li>
            ) : (
              <li
                key={index}
                className="page-item disabled"
              >
                <span
                  className="page-link"
                  dangerouslySetInnerHTML={{ __html: link.label }}
                />
              </li>
            )
          )}
        </ul>
      </nav>
    </div>
  );
}
