import { createRoot } from 'react-dom/client';
import { TopHeadlines } from './views/top-headlines';

const elementRoot = document.getElementById('root');
const root = createRoot(elementRoot!);
root.render(<TopHeadlines />);
